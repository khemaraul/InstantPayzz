<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $table = 'excels';
    //public $timestamps = true;
    protected $fillable = ['emp_no', 'emp_name', 'email', 'job_title', 'bank'];
}
