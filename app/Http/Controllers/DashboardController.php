<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Excel;
use App\Models\Excel1;
//use App\Models\Department;
//use App\Models\Employee;
//use App\Models\Country;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $employeeCount = Excel::count();
            $payrollCount = Excel1::count();
            $payslipCount = Excel1::count();
            $usersCount = User::count();
            // dd($employeeCount); die;
            //$departments = DB::table('department')->count();
            //$countries = DB::table('country')->count();
            //$countries = DB::table('country')->count();

        /*return view('dashboard', ['employeeCount' => $employeeCount, 'countries'
        => $countries, 'departments' => $departments]);*/
        return view('dashboard', ['employeeCount' => $employeeCount, 'payrollCount' => $payrollCount, 'payslipCount' => $payslipCount, 'usersCount' => $usersCount]);
    }

    public function indexDashbord()
    {
        $employees = DB::table('employees')->count();
            //$departments = DB::table('department')->count();
            //$countries = DB::table('country')->count();
            //$countries = DB::table('country')->count();
    }
}
