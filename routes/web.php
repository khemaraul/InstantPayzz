<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/excelExport', [App\Http\Controllers\ExcelController::class, 'show']);
Route::get('/excelExport/export', [App\Http\Controllers\ExcelController::class, 'export'])->name('excelExport.excel');
Route::get('/excelExport/import', [App\Http\Controllers\ExcelController::class, 'show']);
Route::post('/excelExport/import', [App\Http\Controllers\ExcelController::class, 'store']);
Route::get('/list-employees', [App\Http\Controllers\ExcelController::class, 'index']);
Route::get('list-employees/getEmployees/', [App\Http\Controllers\ExcelController::class, 'getEmployees'])->name('list-employees.getEmployees');
Route::get('/add-new-emp', [App\Http\Controllers\ExcelController::class, 'insert']);
Route::post('/add-new-emp/data', [App\Http\Controllers\ExcelController::class, 'create']);

Route::get('/payroll/upload-payroll', [App\Http\Controllers\PayrollController::class, 'show']);
Route::get('/payroll/upload-payroll/export', [App\Http\Controllers\PayrollController::class, 'export'])->name('upload-payroll.excel');
Route::get('/payroll/upload-payroll/import', [App\Http\Controllers\PayrollController::class, 'show']);
Route::post('/payroll/upload-payroll/import', [App\Http\Controllers\PayrollController::class, 'store']);
Route::get('/payroll/list-uploaded-payroll', [App\Http\Controllers\PayrollController::class, 'index']);
Route::get('/payroll/list-uploaded-payroll/getUploadedpayroll/', [App\Http\Controllers\PayrollController::class, 'getUploadedpayroll'])->name('list-uploaded-payroll.getUploadedpayroll');
Route::get('/payroll/payslips/', [App\Http\Controllers\PrintController::class, 'payslipindex'])->name('payroll-payslip');
Route::get('/prnpriview', [App\Http\Controllers\PrintController::class,'prnpriview'])->name('prnpriview');

Route::get('/payroll/sendMail', [App\Http\Controllers\PrintController::class,'send'])->name('sendMail');
Route::get('change-password', [App\Http\Controllers\ChangePasswordController::class,'index']);
Route::post('change-password', [App\Http\Controllers\ChangePasswordController::class,'store'])->name('change.password');
