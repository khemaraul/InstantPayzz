<?php

namespace App\Exports;

use App\Models\Excel1;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PayrollExport implements WithHeadings,FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $recordCount = Excel1::count();
        return DB::table('payrolls')->select('*')->where('id','>',$recordCount)->get();
    }
    /**
    * @return \Illuminate\Support\Headings
    */
    public function headings(): array
    {
        return ['P/No', 'Gross Pay', 'Commission', 'Leave Allowance', 'Total Pay','P.A.Y.E', 'NHIF', 'NSSF', 'HELB', 'Insurance','Lost Hours', 'Sacco', 'Recovery', 'Arrears', 'Total Deductions','Net Amount','Employee No'];
    }
}
