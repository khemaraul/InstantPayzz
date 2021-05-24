<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Excel;
use App\Models\Payroll;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use DB;

class PrintController extends Controller
{
    function payslipindex(Request $request){
        $id = $request->input('id');
        $dataSlip = DB::table('excels')
        ->select('*')
        ->join('payrolls as payroll', 'excels.emp_no', '=', 'payroll.emp_no')
        ->where('excels.id', $id)
        ->get();
        //echo "=".$dataSlip;
       return view('payroll/payslips',[ 'dataSlip' => $dataSlip]);
    }
    public function prnpriview(Request $request)
      {
        $id = $request->input('id');
        $dataSlip = DB::table('excels')
        ->select('*')
        ->join('payrolls as payroll', 'excels.emp_no', '=', 'payroll.emp_no')
        ->where('excels.id', $id)
        ->get();
        //echo "=".$dataSlip;
       return view('payroll/print-payslips',[ 'dataSlip' => $dataSlip]);
      }
      public function send(Request $request){
        $count = Excel::count();
        for($id = 1; $id < $count+1; $id++){
        //$dataslips = array();
        $dataslips = DB::table('excels')
        ->select('*')
        ->join('payrolls as payroll', 'excels.emp_no', '=', 'payroll.emp_no')
        ->where('excels.id', $id)
        ->get();
        $email = DB::table('excels')
        ->select('email')
        ->where('excels.id', $id)
        ->get();
        //echo "=".$email;
            Mail::to($email)->send(new TestMail($dataslips));
        }
        return back()->with('success', 'Payslips sends to the Employees Email Address...');
    }
}
