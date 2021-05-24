<?php

namespace App\Imports;

use App\Models\Excel1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PayrollImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Excel1([
            'p_no' => $row[0],
            'gross_pay' => $row[1],
            'commission' => $row[2],
            'leave_allowance' => $row[3],
            'total_pay' => $row[4],
            'paye' => $row[5],
            'nhif' => $row[6],
            'nssf' => $row[7],
            'helb' => $row[8],
            'insurance' => $row[9],
            'last_hours' => $row[10],
            'sacco' => $row[11],
            'recovery'=> $row[12],
            'arrears' => $row[13],
            'total_deductions' => $row[14],
            'net_amt' => $row[15],
            'month' => request('myOption1'),
            'year' => request('year'),
            'emp_no' => $row[16],
        ]);
    }
}
