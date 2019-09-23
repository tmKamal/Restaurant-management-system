<?php

namespace App\Exports;

use App\Inventory;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

        return Inventory::select('id','Product_Name','Brand_Name','Quantity','Category','Ordered_Date','Arrived_Date','Expire_Date','Manufactured_Date');
        
    }
    public function headings(): array
    {
        return [
            'ID',
            'Product Name',
            'Brand Name',
            'Quantity',
            'Category',
            'Ordered_Date',
            'Arrived_Date',
            'Expire_Date',
            'Manufaactured_date'
        ];
    }
}
