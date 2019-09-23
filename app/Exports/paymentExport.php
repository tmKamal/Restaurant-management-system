<?php

namespace App\Exports;

use App\Order;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class paymentExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

        return Order::select('itemid','itemname','paymentid','qty','price')->where('paystatus','=','1');
        
    }
    public function headings(): array
    {
        return [
            'ITEM_ID',
            'ITEM NAME',
            'PAYMENT ID',
            'QTY',
            'PRICE'
        ];
    }
}
