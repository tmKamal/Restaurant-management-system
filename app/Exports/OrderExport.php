<?php

namespace App\Exports;

use App\Order;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

        return Order::select('itemname','price','ordertype','address','orderstatus')->where('orderstatus','=','delivered');
        
    }
    public function headings(): array
    {
        return [
            'ITEMNAME',
            'PRICE',
            'TYPE',
            'ADDRESS',
            'STATUS'
        ];
    }
}
