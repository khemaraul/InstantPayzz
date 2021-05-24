<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PayrollExport;
use App\Imports\PayrollImport;
use App\Models\Employee;
use App\Models\Payroll;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;

class PayrollController extends Controller
{
    //
    function index(){
        $data = DB::table('excels')->paginate(5);
        return view('payroll/list-uploaded-payroll', compact('data'));
    }
    /*function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $data = DB::table('excels')->paginate(5);
      return view('list-employees', compact('data'))->render();
     }
    }*/
    public function getUploadedpayroll(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Employee::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Employee::select('count(*) as allcount')->where('emp_name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        /*$records = Employee::orderBy($columnName,$columnSortOrder)
          ->where('excels.emp_name', 'like', '%' .$searchValue . '%')
          ->select('excels.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();
          */
          $records = DB::table('excels')
          ->select('*')
          ->join('payrolls as payroll', 'excels.emp_no', '=', 'payroll.emp_no')
          ->where('excels.emp_name', 'like', '%' .$searchValue . '%')
          //->orderBy($columnName,$columnSortOrder)
          ->skip($start)
          ->take($rowperpage)
          ->get();

        $data_arr = array();

        foreach($records as $record){
           $id = $record->id;
           $emp_no = $record->emp_no;
           $emp_name = $record->emp_name;
           $gross_pay = $record->gross_pay;
           $total_pay = $record->total_pay;
           $total_deductions = $record->total_deductions;
           $net_amt = $record->net_amt;

           $data_arr[] = array(
             "id" => $id,
             "emp_no" => $emp_no,
             "emp_name" => $emp_name,
             "gross_pay" => $gross_pay,
             "total_pay" => $total_pay,
             "total_deductions" => $total_deductions,
             "net_amt" => $net_amt

           );
        }
        /*return Datatables::of($data_arr)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        //$btn = '<a href="{{ route(\'/payroll/payslips/\',[\'id\' => $row->id]) }}" class="btn btn-danger">Payslips</a>';
                        //$btn = '<a href="'.route("payroll-payslip", $row->id).'" class="btn btn-danger">Payslips</a>';
                        return '<a href="'.route("payroll-payslip").'" class="btn btn-danger">Payslips</a>';
                        //return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);*/

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
      }
    function show(){

        return view('payroll/upload-payroll');
    }
    public function export()
    {
        //return Excel::download(new Excel, 'excel.xlsx');
        return (new PayrollExport)->download('excel.xlsx');
    }
    public function store(Request $request){
        $file = $request->file('select_file');
        //$month = $request->input('myOption1');
        //$year = $request->input('year');
        //Excel::import(new PayrollImport, $file, $month, $year);
        Excel::import(new PayrollImport, $file);
        //return back()->withStatus('Excel file imported successfully');
        return back()->with('success', 'Excel file imported successfully');
    }
    function payslipindex(Request $request){
        $id = $request->input('id');
        $dataSlip = DB::table('excels')
        ->select('*')
        ->join('payrolls as payroll', 'excels.emp_no', '=', 'payroll.emp_no')
        ->where('excels.id', $id)
        ->get();
       return view('payroll/payslips',[ 'dataSlip' => $dataSlip]);
    }
}
