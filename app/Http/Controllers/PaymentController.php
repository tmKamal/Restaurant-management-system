<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
   public function payView(){

       $items = DB::table('cart')->where(['userid'=>Auth::user()->id])->get();
       return view('restaurant.CashOnDelivery')->with('items',$items);
   }

    public function payonline(){

        $items = DB::table('cart')->where(['userid'=>Auth::user()->id])->get();
        return view('restaurant.payment')->with('items',$items);
    }


   Public function notify(Request $request){
       $merchant_id         = $_POST['merchant_id'];
       $order_id             = $_POST['order_id'];
       $payhere_amount     = $_POST['payhere_amount'];
       $payhere_currency    = $_POST['payhere_currency'];
       $status_code         = $_POST['status_code'];
       $md5sig                = $_POST['md5sig'];

       $items = DB::table('cart')->where('userid','like',Auth::user()->id)->get();

       foreach ($items as $item){
           $order = [
               'itemid' => $item->itemid,
               'itemname' => $item->itemname,
               'userid' => Auth::user()->id,
               'qty' => 5,
               'paystatus' => 'COD',
               'ordertype' => 'Type',
               'address' => 'dsadefasd',
               'price' => 323,
               'chefstatus' => "Que",
               'status' => 'unpaid'

           ];
           DB::table('orders')->insert($order);
           DB::table('cart')->where([['itemid','=',$item->itemid],['userid','like',Auth::user()->id]])->delete();
       }

       return view('restaurant.index')->with("success","Payment completed");
   }
   public function returnUrl(){
       return view('restaurant.cart')->with("success","saioda");
   }

    public function cancelUrl(){
        return view('restaurant.cart')->with("error","saiodads");
    }
    public function test(){
        return view('restaurant.test');
    }

    function submit(Request $request){
        $items = DB::table('cart')->where('userid','like',Auth::user()->id)->get();
        $payId = uniqid();
        $total = 0;
        $data = $request->all();

        foreach ($items as $item){
            global $total; $total += ($item->qty)*($item->price);
            $order = [
                'itemid' => $item->itemid,
                'itemname' => $item->itemname,
                'userid' => Auth::user()->id,
                'qty' => $item->qty,
                'paystatus' => '0',
                'paymentid' => $payId,
                'paymenttype' => 'COD',
                'ordertype' => 'Type',
                'address' => $data['address'],
                'price' => $item->price,
                'chefstatus' => "Que",
                'orderstatus' => 'unpaid'

            ];
            DB::table('orders')->insert($order);
            DB::table('cart')->where([['itemid','=',$item->itemid],['userid','like',Auth::user()->id]])->delete();
        }

        $payment = ['paymentId'=>$payId,'userid'=>Auth::user()->id,'paystatus'=>'0','total'=>$total];
        DB::table('payment')->insert($payment);
        return view('restaurant.orderedItems')->with('success','order successfully completed');
    }




}
