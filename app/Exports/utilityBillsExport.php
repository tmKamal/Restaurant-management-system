<?php

namespace App\Exports;

use App\Order;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class utilityBillsExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

        return Utility::select('id','status','expenseName','category','date','amount','note');
        
    }
    public function headings(): array
    {
        return [
            'ID',
            'STATUS',
            'EXPENSE NAME',
            'CATEGORY',
            'PAYMENT',
            'NOTE'
        ];
    }
}
