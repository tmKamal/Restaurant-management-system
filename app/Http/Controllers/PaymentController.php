<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\paymentExport;
use Maatwebsite\Excel\Facades\Excel;


class PaymentController extends Controller
{
   public function payView(){

       $items = DB::table('cart')->where(['userid'=>Auth::user()->id])->get();
       return view('restaurant.payment')->with('items',$items);
   }

   public function exportPayments(){
    return Excel::download(new paymentExport,'Payments.xlsx');
} 



}
