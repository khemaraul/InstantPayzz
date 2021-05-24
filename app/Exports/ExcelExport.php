<?php

namespace App\Exports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ExcelExport implements WithHeadings,FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $recordCount = Excel::count();
        return DB::table('excels')->select('*')->where('id','>',$recordCount)->get();
    }
    /**
    * @return \Illuminate\Support\Headings
    */
    public function headings(): array
    {
        return ['emp no', 'emp name', 'email', 'job title', 'bank'];
    }
}
