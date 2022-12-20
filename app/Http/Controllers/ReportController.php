<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FeesChargedResource;
use App\Http\Resources\TransactionMasterResource;
use App\Models\CustomVoucher;
use App\Models\Ledger;
use App\Models\StudentCourseRegistration;
use App\Models\TransactionDetail;
use App\Models\TransactionMaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ReportController extends Controller
{
    //
    public function get_all_income_report(){
        $result = DB::select("select get_curr_month_total_cash() as total_monthly_cash, 
        get_curr_month_total_bank() as total_monthly_bank,
        get_curr_year_total_cash() as total_yearly_cash,
        get_curr_year_total_bank() as total_yearly_bank,
        get_curr_month_total_cash()+get_curr_month_total_bank() as total_monthly_income,
        get_curr_year_total_cash()+get_curr_year_total_bank() as total_yearly_income");
        return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function getStudentBirthdayReport()
    {
       
         $result=DB::table('ledgers')
        ->where(DB::raw('day(dob)'),'>=',DB::raw('day(current_date())'))
        ->where(DB::raw('month(dob)'),'=',DB::raw('month(current_date())'))
        ->orderBy(DB::raw('day(current_date())- day(dob)'),'DESC')
        ->select('ledgers.ledger_name',
        'ledgers.guardian_contact_number',
        'ledgers.whatsapp_number',
        'ledgers.dob',
        DB::raw('day(current_date()) as sysday'),
        DB::raw('day(dob) as birthDay'),
        DB::raw('day(dob) - day(current_date()) as PandingDays')
         )
         ->get();

         return response()->json(['success'=>1,'data'=> $result], 200,[],JSON_NUMERIC_CHECK);
         //--------------------------------------------
        
    }
}
