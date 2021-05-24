<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    use HasFactory;
    protected $table = 'payrolls';
    //public $timestamps = true;
    protected $fillable = ['p_no','gross_pay','commission','leave_allowance','total_pay','paye','nhif','nssf','helb','insurance','last_hours','sacco','recovery','arrears','total_deductions','net_amt','month','year','emp_no'];
}
