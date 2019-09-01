<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\item;

class OrderController extends Controller
{
    public function viewCart(){
        $items = DB::table('cart')->where(['userid'=>Auth::user()->id])->get();

        return view('restaurant.cart')->with('items',$items);
    }

    public function addToCart(Request $request, $id){

        if(!isset(Auth::user()->id)){
            return redirect()->back()->with('error','You have to login to your account');
        }

        $qty = DB::table('cart')->where([['itemid','=',$id],['userid','like',Auth::user()->id]])->value('qty');

        if(isset($qty)){
            DB::table('cart')->where([['itemid','=',$id],['userid','like',Auth::user()->id]])->update(['qty'=>$qty+1]);
            return redirect()->back()->with('success','Item already in the cart. Quantity has been increased');
        }else{
        $prod = DB::table('item')->find($id);
        $item = [
            'image' => 'https://assets3.thrillist.com/v1/image/2797371/size/tmg-article_default_mobile.jpg',
            'itemid' => $request->id,
            'userid' => Auth::user()->id,
            'itemname' => $prod->itemname,
            'price' => $prod->price,
            'qty' => 1

        ];
            DB::table('cart')->insert($item);
            return redirect()->back()->with('success','Item added to cart');
        }


    }


    public function removeCartItem($id){


        DB::table('cart')->where([['itemid','=',$id],['userid','like',Auth::user()->id]])->delete();

        return redirect()->back()->with('success','Item successfully removed from Cart');
    }

    public function buyNow(Request $request, $id){

        $item = DB::table('item')->where('id','=',$id);
        return view('restaurant.payment')->with('item',$item);
    }

    public function codpay(Request $request)
    {
        $items = DB::table('cart')->where('userid','like',Auth::user()->id)->get();

        foreach ($items as $item){
            $order = [
                'itemid' => $item->itemid,
                'itemname' => $item->itemname,
                'userid' => Auth::user()->id,
                'qty' => $item->qty,
                'paystatus' => 'COD',
                'type' => 'Type',
                'status' => 'unpaid'

            ];
            DB::table('orders')->insert($order);
            DB::table('cart')->where([['itemid','=',$item->itemid],['userid','like',Auth::user()->id]])->delete();
        }

        return view('restaurant.orderedItems')->with('success','order successfully completed');
    }

    public function increase($id){
        $qty = DB::table('cart')->where([['itemid','=',$id],['userid','like',Auth::user()->id]])->value('qty');

        DB::table('cart')->where([['itemid','=',$id],['userid','like',Auth::user()->id]])->update(['qty'=>$qty+1]);
        return redirect()->back()->with('success','Quantity increased');
    }

    public function decrease($id){
        $qty = DB::table('cart')->where([['itemid','=',$id],['userid','like',Auth::user()->id]])->value('qty');

        if($qty==1){
            return redirect()->back()->with('error','Quantity can\'t be decreased');
        }else{
            DB::table('cart')->where([['itemid','=',$id],['userid','like',Auth::user()->id]])->update(['qty'=>$qty-1]);
            return redirect()->back()->with('success','Quantity decreased.');
        }


    }
}
