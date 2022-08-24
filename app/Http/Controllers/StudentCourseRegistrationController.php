<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CustomVoucher;
use App\Models\Ledger as Student;
use App\Models\StudentCourseRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;
use App\Models\TransactionDetail;
use App\Models\TransactionMaster;

class StudentCourseRegistrationController extends Controller
{
    public function index()
    {
        $courseRegistration= StudentCourseRegistration::get();
        return response()->json(['success'=>1,'data'=> $courseRegistration], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getCourseIdByStudentToCourseRegistrationId($id)
    {
        $courseRegistration= DB::table('student_course_registrations')
        ->where('student_course_registrations.id', '=', $id)
        ->select('student_course_registrations.ledger_id', 
        'student_course_registrations.course_id') ->get();
        return response()->json(['success'=>1,'data'=> $courseRegistration], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getStudentToCourseRegistration()
    {
        //$courseRegistration= StudentCourseRegistration::get();
        $result = DB::table('student_course_registrations')
            ->join('transaction_masters', 'transaction_masters.student_course_registration_id', '=', 'student_course_registrations.id')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
            ->join('duration_types', 'duration_types.id', '=', 'student_course_registrations.duration_type_id')
            ->select('student_course_registrations.id', 
            'student_course_registrations.ledger_id',
            'student_course_registrations.course_id',
            DB::raw('transaction_masters.id as transaction_masters_id'),
            'ledgers.ledger_name',
            'ledgers.billing_name',
            'courses.course_code',
            'courses.short_name',
            'courses.full_name',
            'student_course_registrations.base_fee',
            'student_course_registrations.discount_allowed',
            'student_course_registrations.joining_date',
            'student_course_registrations.effective_date',
            'student_course_registrations.actual_course_duration',
            'student_course_registrations.duration_type_id',
            'duration_types.duration_name'
               )
            ->get();
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function getStudentToCourseRegistrationById(Request $request)
    {
        $ledgerId = $request->input('ledger_id');
        $courseId = $request->input('course_id');
        //$courseRegistration= StudentCourseRegistration::get();
        $result = DB::table('student_course_registrations')
            ->join('transaction_masters', 'transaction_masters.student_course_registration_id', '=', 'student_course_registrations.id')
            ->join('courses', 'courses.id', '=', 'student_course_registrations.course_id')
            ->join('ledgers', 'ledgers.id', '=', 'student_course_registrations.ledger_id')
            ->join('duration_types', 'duration_types.id', '=', 'student_course_registrations.duration_type_id')
            ->where('student_course_registrations.ledger_id', '=', $ledgerId)
            ->where('student_course_registrations.course_id', '=', $courseId)
            ->select('student_course_registrations.id', 
            'student_course_registrations.ledger_id',
            'student_course_registrations.course_id',
            DB::raw('transaction_masters.id as transaction_masters_id'),
            'ledgers.ledger_name',
            'ledgers.billing_name',
            'courses.course_code',
            'courses.short_name',
            'courses.full_name',
            'student_course_registrations.base_fee',
            'student_course_registrations.discount_allowed',
            'student_course_registrations.joining_date',
            'student_course_registrations.effective_date',
            'student_course_registrations.actual_course_duration',
            'student_course_registrations.duration_type_id',
            'duration_types.duration_name'
               )
            ->get();
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function store(Request $request)
    {
        /*
            {
                "courseId": 1,
                "studentId": 13,
                "effectiveDate": "2021-04-05",
                "baseFee": 1250,
                "discountAllowed": 10,
                "isStarted": 1
            }
         * */

        $input=($request->json()->all());
        //$input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);

        $rules = array(
            'courseId' => 'bail|required|exists:courses,id',
            'baseFee' => 'bail|required|integer|gt:0',
            'discountAllowed'=>'lt:baseFee',
            'effectiveDate' => 'bail|required|date_format:Y-m-d',
            'studentId' => ['bail','required','exists:ledgers,id',
                            function($attribute, $value, $fail){
                                $student=Student::where('id', $value)->where('is_student','=',1)->first();
                                if(!$student){
                                    $fail($value.' is not a valid student id');
                                }
                            }],
        );
        $messages = array(
            'courseId.required'=> 'Course ID is required', // custom message
            'courseId.exists'=> 'This course ID does not exists', // custom message
            'studentId.required'=> 'You have to input student ID', // custom message
            'studentId.exists'=> 'This student does not exists', // custom message
            'discountAllowed.lt'=> 'Discount should be lower than the Base Price' // custom message
        );

        $validator = Validator::make($request->all(),$rules,$messages );

        if ($validator->fails()) {
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        $courseId = $request->input('courseId');
        $courseCode = Course::findOrFail($courseId)->course_code;
        if($request->has('joiningDate')) {
            $joiningDate = $request->input('joiningDate');
        }else{
            $joiningDate=Carbon::now()->format('Y-m-d');
        }
        DB::beginTransaction();

        try{
            $temp_date = explode("-",$joiningDate);
            if($temp_date[1]>3){
                $x = $temp_date[0]%100;
                $accounting_year = $x*100 + ($x+1);
            }else{
                $x = $temp_date[0]%100;
                $accounting_year =($x-1)*100+$x;
            }
            $voucher="StudentCourseRegistration";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='CODER';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,3,"0",STR_PAD_LEFT);
            //creating reference number
            $reference_number = $courseCode.''.$counter."@".$accounting_year;


            // if any record is failed then whole entry will be rolled back
            //try portion execute the commands and catch execute when error.
            $courseRegistration= new StudentCourseRegistration();
            $courseRegistration->reference_number = $reference_number;
            $courseRegistration->ledger_id = $request->input('studentId');
            $courseRegistration->course_id= $request->input('courseId');
            $courseRegistration->base_fee= $request->input('baseFee');
            $courseRegistration->discount_allowed= $request->input('discountAllowed');
            $courseRegistration->joining_date= $joiningDate;
            $courseRegistration->effective_date= $request->input('effectiveDate');
            $courseRegistration->actual_course_duration= $request->input('actual_course_duration');
            $courseRegistration->duration_type_id= $request->input('duration_type_id');
            $courseRegistration->is_started= $request->input('isStarted');
            $courseRegistration->save();

            //---------------------------------------------------------
            $result_array=array();
            $accounting_year = get_accounting_year($joiningDate);
            $voucher="Fees Charged";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='FEES';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;

             //saving transaction master
             $transaction_master= new TransactionMaster();
             $transaction_master->voucher_type_id = 9; // 9 is the voucher_type_id in voucher_types table for Fees Charged Journal Voucher
             $transaction_master->transaction_number = $transaction_number;
             $transaction_master->transaction_date =  $joiningDate;
             $transaction_master->student_course_registration_id = $courseRegistration->id;
             /* $transaction_master->comment = $input_transaction_master->comment; */
             $transaction_master->fees_year =  $request->input('feesYear');
             $transaction_master->fees_month = $request->input('feesMonth');
             $transaction_master->save();
             $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transaction_master->id;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount;
                 $td->save();
                 $transaction_details[]=$td;
             }
             $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=> $courseRegistration], 200,[],JSON_NUMERIC_CHECK);
    }
    public function update(Request $request)
    {
        $input=($request->json()->all());
        $input_transaction_details=($input['transactionDetails']);

        if($request->has('joiningDate')) {
            $joiningDate = $request->input('joiningDate');
        }else{
            $joiningDate=Carbon::now()->format('Y-m-d');
        }
       
        $transactionMasterID=$request->input('transactionMasterId');

          // ------ delete record ---------
          $tran_details=TransactionDetail::where('transaction_master_id',$transactionMasterID)->delete();
          if(!$tran_details){
              return response()->json(['success'=>1,'data'=>'Sorry Data Not Deleted:'.$transactionMasterID], 200,[],JSON_NUMERIC_CHECK);
          }

        $studentCourseRegistrations= new StudentCourseRegistration();
        $studentCourseRegistrations= StudentCourseRegistration::find($request->input('studentToCourseID'));
        $studentCourseRegistrations->ledger_id=$request->input('studentId');
        $studentCourseRegistrations->course_id=$request->input('courseId');
        $studentCourseRegistrations->base_fee=$request->input('baseFee');
        $studentCourseRegistrations->discount_allowed=$request->input('discountAllowed');
        $studentCourseRegistrations->joining_date=$joiningDate;
        $studentCourseRegistrations->effective_date=$request->input('effectiveDate');
        $studentCourseRegistrations->actual_course_duration=$request->input('actual_course_duration');
        $studentCourseRegistrations->duration_type_id=$request->input('duration_type_id');
       
        $studentCourseRegistrations->save();
        
       
        //------------- update code of Transaction Master  code ---------------------
        $transaction_master=TransactionMaster::find($transactionMasterID);
        if($request->input('joining_date')){
           $transaction_master->transaction_date =  $joiningDate;
        }
        $transaction_master->save();

       
         //------------- update code of Transaction Details code ---------------------
         $result_array['transaction_master']=$transaction_master;
             $transaction_details=array();
             foreach($input_transaction_details as $transaction_detail){
                 $detail = (object)$transaction_detail;
                 $td = new TransactionDetail();
                 $td->transaction_master_id = $transactionMasterID;
                 $td->ledger_id = $detail->ledgerId;
                 $td->transaction_type_id = $detail->transactionTypeId;
                 $td->amount = $detail->amount;
                 $td->save();
                 $transaction_details[]=$td;
             }
       
            $result_array['transaction_details']=$td;

           
        return response()->json(['success'=>1,'data'=> $studentCourseRegistrations], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentCourseRegistration  $studentCourseRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentCourseRegistrations= StudentCourseRegistration::find($id);
        if(!empty($studentCourseRegistrations)){
            $result = $studentCourseRegistrations->delete();
        }else{
            $result = false;
        }
        return response()->json(['success'=>$result,'id'=>$id], 200);
    }
}
