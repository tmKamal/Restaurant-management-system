<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $dates = ['created_at', 'updated_at', 'oDate', 'aDate', 'mDate', 'eDate'];

    public function setMydateAttribute($date){
           $this->attributes['mydate'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function getMydateAttribute($date){
         if (is_null($date))
             {
                 return Carbon::now(); // instance of carbon with current timestamp
             }
             return $date;
       }
}
