<?php

use App\Http\Controllers\FeesModeTypeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StudentCourseRegistrationController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DurationTypeController;
use App\Http\Controllers\StudentQueryController;
use App\Http\Controllers\BijoyaRegistrationController;
use App\Http\Controllers\ReportController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//get the user if you are authenticated
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login",[UserController::class,'login']);
Route::get("login",[UserController::class,'authenticationError'])->name('login');



Route::post("register",[UserController::class,'register']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    Route::get("revokeAll",[UserController::class,'revoke_all']);

    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
    Route::get("user",[UserController::class,'getCurrentUser']);
    Route::get("logout",[UserController::class,'logout']);

    //get all users
    Route::get("users",[UserController::class,'getAllUsers']);
    Route::post('uploadPicture',[UserController::class,'uploadUserPicture']);
    Route::post('uploadStudentPicture',[UserController::class,'uploadStudentPicture']);

    //getting question
    Route::get("/questions",[QuestionController::class, 'index']);
    Route::get("/questions/type/{questionTypeId}",[QuestionController::class, 'questionsByTypeId']);
    Route::get("/questions/level/{questionLevelId}",[QuestionController::class, 'questionsByLevelId']);
    Route::get("/questions/type/{questionTypeId}/level/{questionLevelId}",[QuestionController::class, 'questionsByOptionAndLevelId']);
    Route::patch("/questions/{id}/level/{questionLevelId}",[QuestionController::class, 'updateQuestionLevel']);

    Route::post("/questions",[QuestionController::class, 'save_question']);

    // student related API address placed in a group for better readability
    Route::group(array('prefix' => 'students'), function() {
        // এখানে সকলকেই দেখাবে, যাদের কোর্স দেওয়া হয়েছে ও যাদের দেওয়া হয়নি সবাইকেই
        Route::get("/", [StudentController::class, 'index']);
        Route::get("/studentId/{id}", [StudentController::class, 'get_student_by_id']);

        // get any Ledger by Ledger group id
        Route::get("/feesName", [StudentController::class, 'get_all_feesname']);
        Route::get("/feesNameDiscount", [StudentController::class, 'get_discount_feesname']);
        // get Student to Course id by Student id
        Route::get("/studentToCourses/{id}", [StudentController::class, 'get_student_to_courses_by_id']);

        // কোন একজন student এর কি কি কোর্স আছে তা দেখার জন্য, যে গুলো চলছে বা শেষ হয়ে গেছে সবই
        Route::get("/studentId/{id}/courses", [StudentController::class, 'get_courses_by_id']);
        // কোন একজন student এর কি কি কোর্স শেষ হয়ে গেছে।
        Route::get("/studentId/{id}/completedCourses", [StudentController::class, 'get_completed_courses_by_id']);
        // কোন একজন student এর কি কি কোর্স চলছে।
        Route::get("/studentId/{id}/incompleteCourses", [StudentController::class, 'get_incomplete_courses_by_id']);

        //যে সব স্টুডেন্টদের কোর্স দেওয়া হয়েছে তাদের পাওয়ার জন্য, যাদের শেষ হয়ে গেছে তাদেরকেও দেখানো হবে।
        Route::get("/registered/yes", [StudentController::class, 'get_all_course_registered_students']);
        //যে সব স্টুডেন্টের নাম নথিভুক্ত হওয়ার পরেও তাদের কোন কোর্স দেওয়া হয়নি তাদের পাওয়ার জন্য
        Route::get("/registered/no", [StudentController::class, 'get_all_non_course_registered_students']);
        //যে সব স্টুডেন্টের কোর্স বর্তমানে চলছে তাদের দেখার জন্য আমি এটা ব্যবহার করেছি। যাদের শেষ হয়ে গেছে তাদেরকেও দেখানো হবে না।
        Route::get("/registered/current", [StudentController::class, 'get_all_current_course_registered_students']);
        Route::get("/isDeletable/{id}", [StudentController::class, 'is_deletable_student']);

        Route::post("/",[StudentController::class, 'store']);
        Route::post("/store_multiple",[StudentController::class, 'store_multiple']);
        Route::patch("/",[StudentController::class, 'update']);
        Route::delete("/{id}",[StudentController::class, 'delete']);
    });



    Route::get("states",[StateController::class, 'index']);
    Route::get("states/{id}",[StateController::class, 'index_by_id']);


    //course
    // nanda gopal api
    Route::get("coursesTotal",[CourseController::class, 'get_total_course']);
    Route::get("coursesMonthly",[CourseController::class, 'get_total_monthly_course']);
    Route::get("coursesFull",[CourseController::class, 'get_total_full_course']);
    //-------------------
    Route::get("courses",[CourseController::class, 'index']);
    Route::get("courses/{id}",[CourseController::class, 'index_by_id']);
    Route::post("courses",[CourseController::class, 'store']);
    Route::patch("courses",[CourseController::class, 'update']);



    //Fees Modes
    Route::get("feesModeTypes",[FeesModeTypeController::class, 'index']);
    Route::get("feesModeTypes/{id}",[FeesModeTypeController::class, 'index_by_id']);

    //DurationTypes
    Route::get("durationTypes",[DurationTypeController::class, 'index']);
    Route::get("durationTypes/{id}",[DurationTypeController::class, 'indexById']);
    Route::post("durationTypes",[DurationTypeController::class, 'store']);
    Route::patch("durationTypes",[DurationTypeController::class, 'update']);
    Route::delete("durationTypes/{id}",[DurationTypeController::class, 'destroy']);


    Route::get("subjects",[SubjectController::class, 'index']);


    //CourseRegistration
    // nanda gopal api
    Route::get("totalActiveStudent",[StudentCourseRegistrationController::class, 'get_total_active_student']);
    Route::get("totalMonthlyActiveStudent",[StudentCourseRegistrationController::class, 'get_total_monthly_active_student']);
    Route::get("totalFullCourseActiveStudent",[StudentCourseRegistrationController::class, 'get_total_full_course_active_student']);
    //-------------------
    Route::get("registerStudent",[StudentCourseRegistrationController::class, 'getRegisterStudent']);
    Route::get("FeesModeTypeById/{id}",[StudentCourseRegistrationController::class, 'getFeesModeTypeById']);
    Route::get("getStudentCourseRegistrations",[StudentCourseRegistrationController::class, 'getStudentToCourseRegistration']);
    Route::get("getCourseId/{id}",[StudentCourseRegistrationController::class, 'getCourseIdByStudentToCourseRegistrationId']);
    Route::post("getRegisterCourseByStudentId",[StudentCourseRegistrationController::class, 'getStudentToCourseRegistrationById']);
    Route::post("studentCourseRegistrations",[StudentCourseRegistrationController::class, 'store']);
    Route::get("studentCourseRegistrations",[StudentCourseRegistrationController::class, 'index']);
    Route::delete("studentCourseRegistrations/{id}",[StudentCourseRegistrationController::class, 'destroy']);
    Route::patch("studentCourseRegistrations",[StudentCourseRegistrationController::class, 'update']);


    Route::get("logout",[UserController::class,'logout']);


    Route::get("users",[UserController::class,'index']);


    //transactions
    Route::group(array('prefix' => 'transactions'), function() {

        
        Route::get("/all",[TransactionController::class, 'get_all_transactions']);

        Route::get("/workingDays",[TransactionController::class, 'get_count_working_days']);

        Route::get("/feesCharged",[TransactionController::class, 'get_all_fees_charged_transactions']);

        Route::get("/dues/studentId/{id}",[TransactionController::class, 'get_total_dues_by_student_id']);

        Route::get("/dues/SCRId/{id}",[TransactionController::class, 'get_student_due_by_student_course_registration_id']);

        //----- Nanda gopal code api -------------
        Route::get("/getAutoGenerateEntry",[TransactionController::class, 'get_auto_generate_entry']);
        //Get all Fees charge 
        Route::post("getFeesByLedgerId",[TransactionController::class, 'get_fees_by_ledger_id']);

        //Get all Fees charge
        

        Route::get("/getFeesReceived/{id}",[TransactionController::class, 'get_fees_received_details_by_registration_id']);
        Route::get("/getFeeCharge/{id}",[TransactionController::class, 'get_feeCharge_by_id']);
        Route::get("/allFeesReceived",[TransactionController::class, 'get_all_feeReceived']);
        Route::get("/allFeesCharged",[TransactionController::class, 'get_all_feeCharge']);
        Route::get("/allFeesDiscount",[TransactionController::class, 'get_all_feeDiscount']);
        Route::get("/allTotalDiscountByTranId/{id}",[TransactionController::class, 'get_total_discount_by_trans_id']);
        Route::get("/feesReceivedDetails/{id}",[TransactionController::class, 'get_fees_received_details_by_id']);
        Route::get("/feesChargedDetails/{id}",[TransactionController::class, 'get_fees_charge_details_by_id']);
        Route::get("/feesDiscountDetails/{id}",[TransactionController::class, 'get_fees_discount_details_by_id']);
        Route::get("/feesChargedDetailsMain/{id}",[TransactionController::class, 'get_fees_charge_details_main_by_id']);
        Route::get("/feesChargedDetailsMainOld/{id}",[TransactionController::class, 'get_fees_charge_details_main_by_id_old']);
        Route::get("/feesReceivedDetailsMainOld/{id}",[TransactionController::class, 'get_fees_Received_details_main_by_id_old']);
        Route::get("/feesDueList/{id}",[TransactionController::class, 'get_fees_due_list_by_id']);
        Route::get("/feesDueListByTranId/{id}",[TransactionController::class, 'get_fees_due_list_by_tran_id']);


        Route::get("/getTranMasterId/{id}",[TransactionController::class, 'get_transaction_masterId_by_student_id']);

        Route::patch("/updateFeesCharged/{id}",[TransactionController::class, 'update_fees_charge']);
        // Receipt Bills
        Route::get("/getReceiptId/{id}",[TransactionController::class, 'get_receipt_by_transaction_id']);
        Route::get("/getAllReceiptId/{id}",[TransactionController::class, 'get_all_receipt_by_registration_id']);
        // fee charge compeleted-------

         // fee Received Start-------
        Route::get("/feesChargedReceivedDue/{id}",[TransactionController::class, 'get_feescharge_received_due_list_by_id']);
        Route::get("/getMonthlyStudent",[TransactionController::class, 'get_month_student_list']);
        // End Nanda gopal code api
        //saving fees charged



        Route::post("/feesCharged",[TransactionController::class, 'save_fees_charge']);

        //saving monthly fees charged
        Route::post("/monthlyFeesCharged",[TransactionController::class, 'save_monthly_fees_charge']);

        Route::post("/feesDiscountCharged",[TransactionController::class, 'save_fees_discount_charge']);

        //saving fees received
        Route::post("/feesReceived",[TransactionController::class, 'save_fees_received']);

        Route::get("/billDetails/id/{id}",[TransactionController::class, 'get_bill_details_by_id']);

      

    });

});


    // ALL REPORT API
    Route::get("/getAllIncomeReport",[ReportController::class, 'get_all_income_report']);
    Route::get('/reportStudentBirthday',[ReportController::class,'get_student_birthday_report']);
    Route::get('/reportUpcomingDueList',[ReportController::class,'get_upcoming_due_list_report']);
    Route::get('/reportStudentToCourseRegistrationList',[ReportController::class,'get_student_to_course_registration_report']);
    // END REPORT PART

Route::group(array('prefix' => 'dev'), function() {
    // student related API address placed in a group for better readability
    Route::group(array('prefix' => 'students'), function() {
        // এখানে সকলকেই দেখাবে, যাদের কোর্স দেওয়া হয়েছে ও যাদের দেওয়া হয়নি সবাইকেই
        Route::get("/", [StudentController::class, 'index']);
        Route::get("/studentId/{id}", [StudentController::class, 'get_student_by_id']);

        // কোন একজন student এর কি কি কোর্স আছে তা দেখার জন্য, যে গুলো চলছে বা শেষ হয়ে গেছে সবই
        Route::get("/studentId/{id}/courses", [StudentController::class, 'get_courses_by_id']);
        // কোন একজন student এর কি কি কোর্স শেষ হয়ে গেছে।
        Route::get("/studentId/{id}/completedCourses", [StudentController::class, 'get_completed_courses_by_id']);
        // কোন একজন student এর কি কি কোর্স চলছে।
        Route::get("/studentId/{id}/incompleteCourses", [StudentController::class, 'get_incomplete_courses_by_id']);

        //যে সব স্টুডেন্টদের কোর্স দেওয়া হয়েছে তাদের পাওয়ার জন্য, যাদের শেষ হয়ে গেছে তাদেরকেও দেখানো হবে।
        Route::get("/registered/yes", [StudentController::class, 'get_all_course_registered_students']);
        //যে সব স্টুডেন্টের নাম নথিভুক্ত হওয়ার পরেও তাদের কোন কোর্স দেওয়া হয়নি তাদের পাওয়ার জন্য
        Route::get("/registered/no", [StudentController::class, 'get_all_non_course_registered_students']);
        //যে সব স্টুডেন্টের কোর্স বর্তমানে চলছে তাদের দেখার জন্য আমি এটা ব্যবহার করেছি। যাদের শেষ হয়ে গেছে তাদেরকেও দেখানো হবে না।
        Route::get("/registered/current", [StudentController::class, 'get_all_current_course_registered_students']);
        Route::get("/isDeletable/{id}", [StudentController::class, 'is_deletable_student']);

        Route::post("/",[StudentController::class, 'store']);
        Route::post("/store_multiple",[StudentController::class, 'store_multiple']);
        Route::patch("/",[StudentController::class, 'update']);
        Route::delete("/{id}",[StudentController::class, 'delete']);
    });

//    student_query
    Route::post("studentQuery", [StudentQueryController::class, 'save_query']);

    //course
    Route::get("courses",[CourseController::class, 'index']);
    Route::get("courses/{id}",[CourseController::class, 'index_by_id']);
    Route::post("courses",[CourseController::class, 'store']);



    //Fees Modes
    Route::get("feesModeTypes",[FeesModeTypeController::class, 'index']);
    Route::get("feesModeTypes/{id}",[FeesModeTypeController::class, 'index_by_id']);

    //DurationTypes
    Route::get("durationTypes",[DurationTypeController::class, 'index']);
    Route::get("durationTypes/{id}",[DurationTypeController::class, 'indexById']);
    Route::post("durationTypes",[DurationTypeController::class, 'store']);
    Route::patch("durationTypes",[DurationTypeController::class, 'update']);
    Route::delete("durationTypes/{id}",[DurationTypeController::class, 'destroy']);


    Route::get("subjects",[SubjectController::class, 'index']);


    //CourseRegistration
    Route::post("studentCourseRegistrations",[StudentCourseRegistrationController::class, 'store']);
    Route::get("studentCourseRegistrations",[StudentCourseRegistrationController::class, 'index']);

    Route::delete("studentCourseRegistrations/{id}",[StudentCourseRegistrationController::class, 'destroy']);
    Route::patch("studentCourseRegistrations",[StudentCourseRegistrationController::class, 'update']);


    Route::get("logout",[UserController::class,'logout']);


    Route::get("users",[UserController::class,'index']);



    //transactions
    Route::group(array('prefix' => 'transactions'), function() {
        Route::get("/all",[TransactionController::class, 'get_all_transactions']);
        Route::get("/feesCharged",[TransactionController::class, 'get_all_fees_charged_transactions']);

        Route::get("/dues/studentId/{id}",[TransactionController::class, 'get_total_dues_by_student_id']);

        Route::get("/dues/SCRId/{id}",[TransactionController::class, 'get_student_due_by_student_course_registration_id']);

         //----- Nanda gopal code api -------------
        //Get all Fees charge
        Route::get("/getFeeCharge/{id}",[TransactionController::class, 'get_feeCharge_by_id']);
        Route::get("/allFeesCharged",[TransactionController::class, 'get_all_feeCharge']);
        // End Nanda gopal code api

        //saving fees charged
        Route::post("/feesCharged",[TransactionController::class, 'save_fees_charge']);

        //saving monthly fees charged
        Route::post("/monthlyFeesCharged",[TransactionController::class, 'save_monthly_fees_charge']);

        //saving fees received
        Route::post("/feesReceived",[TransactionController::class, 'save_fees_received']);

        Route::get("/billDetails/id/{id}",[TransactionController::class, 'get_bill_details_by_id']);
    });


    //bijoya registration

    Route::post("/bijoyaRegistrationForm",[BijoyaRegistrationController::class, 'saveStudentInfo']);
    Route::get("/bijoyaRegistrationForm",[BijoyaRegistrationController::class, 'getStudentInfo']);


    //subject

    Route::post("/subject", [SubjectController::class, 'saveSubject']);
    Route::get("/subject", [SubjectController::class, 'index']);

     
});

