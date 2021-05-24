<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('p_no');
            $table->decimal('gross_pay', 13, 2);
            $table->decimal('commission', 13, 2);
            $table->decimal('leave_allowance', 13, 2);
            $table->decimal('total_pay', 13, 2);
            $table->decimal('paye', 13, 2);
            $table->decimal('nhif', 13, 2);
            $table->decimal('nssf', 13, 2);
            $table->decimal('helb', 13, 2);
            $table->decimal('insurance', 13, 2);
            $table->decimal('last_hours', 13, 2);
            $table->decimal('sacco', 13, 2);
            $table->decimal('recovery', 13, 2);
            $table->decimal('arrears', 13, 2);
            $table->decimal('total_deductions', 13, 2);
            $table->decimal('net_amt', 13, 2);
            $table->string('month');
            $table->Integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
