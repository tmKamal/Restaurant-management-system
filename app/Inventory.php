<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $dates = ['created_at', 'updated_at', 'oDate', 'aDate', 'mDate', 'eDate'];
}
