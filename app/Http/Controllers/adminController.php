<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gate;
use App\User;
use App\Order;

class adminController extends Controller
{
    //Admin index view
    function index(){
        return view('restaurant.admin_panel.index');
    }
    //show employee managemnt page
    function showEmployeeMgt(){
        $emp=User::all();

        if(!Gate::allows('isManager')){
            abort(403,"Sorry, You Do not have permission.");
        }

        return view('restaurant.admin_panel.employeeManagement')->with('emp',$emp);
    }

    //update employee type 
    function updateEmp($eId){
        
        $data=request()->all();
        $emp=User::find($eId);
        
        $emp->type=$data['etype'];
        $emp->save();
        return $this->showEmployeeMgt();
    }

    function showDelivery(){

        $oders = DB::table('orders')->where([
            ['type', '=', 'delivery'],
            ['status', '=', 'ready'],
        ])->get();

        return view('restaurant.delivery')->with('deliverys',$oders);

    }

    function pick($dId){
        $deli=Order::find($dId);
        //dd($deli);
        $deli->status='picked';
        $deli->save();
        return $this->showDelivery();
    }

    function showPendingDelivery(){

        $oders = DB::table('orders')->where([
            ['type', '=', 'delivery'],
            ['status', '=', 'picked'],
        ])->get();

        return view('restaurant.deliveryPending')->with('deliverys',$oders);

    }
    function delivered($dId){
        $deli=Order::find($dId);
        //dd($deli);
        $deli->status='delivered';
        $deli->save();
        return $this->showPendingDelivery();
    }
    function showCompletedDelivery(){

        $oders = DB::table('orders')->where([
            ['type', '=', 'delivery'],
            ['status', '=', 'delivered'],
        ])->get();

        return view('restaurant.deliveryFinished')->with('deliverys',$oders);

    }
    
    
    function remove($dId){
        
        $deli=Order::find($dId);
        
        $deli->delete();
        return $this->showCompletedDelivery();
        
    }
}
