<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
   public function payView(){

       $items = DB::table('cart')->where(['userid'=>Auth::user()->id])->get();
       return view('restaurant.payment')->with('items',$items);
   }



}
