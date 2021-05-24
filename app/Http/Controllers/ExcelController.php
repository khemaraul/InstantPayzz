<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ExcelController extends Controller
{
    //
    function index(){
        $data = DB::table('excels')->paginate(5);
        return view('list-employees', compact('data'));
    }
    /*function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $data = DB::table('excels')->paginate(5);
      return view('list-employees', compact('data'))->render();
     }
    }*/
    public function getEmployees(Request $request){

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
        $records = Employee::orderBy($columnName,$columnSortOrder)
          ->where('excels.emp_name', 'like', '%' .$searchValue . '%')
          ->select('excels.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();

        $data_arr = array();

        foreach($records as $record){
           $emp_no = $record->emp_no;
           $emp_name = $record->emp_name;
           $email = $record->email;
           $job_title = $record->job_title;
           $bank = $record->bank;

           $data_arr[] = array(
             "emp_no" => $emp_no,
             "emp_name" => $emp_name,
             "email" => $email,
             "job_title" => $job_title,
             "bank" => $bank

           );
        }

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

        return view('excelExport');
    }
    public function export()
    {
        //return Excel::download(new Excel, 'excel.xlsx');
        return (new ExcelExport)->download('excel.xlsx');
    }
    public function store(Request $request){
        $file = $request->file('select_file');
        Excel::import(new ExcelImport, $file);
        //return back()->withStatus('Excel file imported successfully');
        return back()->with('success', 'Excel file imported successfully');
    }
    public function insert(){
        return view('add-new-emp');
    }
    public function create(Request $request){
        $data = new \App\Models\Excel;
        $data->emp_no = $request['emp_no'];
        $data->emp_name = $request['emp_name'];
        $data->email = $request['email'];
        $data->job_title = $request['job_title'];
        $data->bank = $request['bank'];
        $data->save();
        //return redirect('add-new-emp');
        return back()->with('success', 'New Employee Added Successfully');
    }
    /*public function create(Request $request){
        print_r($request->input());
        $rules = [
			'emp_no' => 'required|numeric|min:3|max:255',
			'city_name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255',
            'first_name' => 'required|string|min:3|max:255',
			'city_name' => 'required|string|min:3|max:255',
			'email' => 'required|string|email|max:255'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('add-new-emp')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$student = new Employee;
                $student->emp_no = $data['emp_no'];
                $student->emp_name = $data['emp_name'];
				$student->email = $data['email'];
                $student->job_title = $data['job_title'];
                $student->bank = $data['bank'];
				$student->save();
				return redirect('add-new-emp')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('add-new-emp')->with('failed',"operation failed");
			}
		}
    }*/

}
