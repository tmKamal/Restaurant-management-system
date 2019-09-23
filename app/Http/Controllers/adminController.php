<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gate;
use App\User;
use App\Order;
use App\Exports\UsersExport;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use JavaScript;

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
            ['ordertype', '=', 'delivery'],
            ['orderstatus', '=', 'ready'],
        ])->get();

        return view('restaurant.delivery')->with('deliverys',$oders);

    }

    function pick($dId){
        $deli=Order::find($dId);
        //dd($deli);
        $deli->orderstatus='picked';
        $deli->save();
        return $this->showDelivery();
    }

    function showPendingDelivery(){

        $oders = DB::table('orders')->where([
            ['ordertype', '=', 'delivery'],
            ['orderstatus', '=', 'picked'],
        ])->get();

        return view('restaurant.deliveryPending')->with('deliverys',$oders);

    }
    function showDeliveryMap(){
        return view('restaurant.gMap');
    }
    function delivered($dId){
        $deli=Order::find($dId);
        //dd($deli);
        $deli->orderstatus='delivered';

        $u = $deli->paymentid;
        $deli->save();
        DB::table('orders')->where('paymentid','=',$u)->update(['paystatus'=>'1']);
        DB::table('payment')->where('paymentid','=',$u)->update(['paystatus'=>'1']);



        return $this->showPendingDelivery();
    }
    function showCompletedDelivery(){

        $oders = DB::table('orders')->where([
            ['ordertype', '=', 'delivery'],
            ['orderstatus', '=', 'delivered'],
        ])->get();

        return view('restaurant.deliveryFinished')->with('deliverys',$oders);

    }
    
    
    function remove($dId){
        
        $deli=Order::find($dId);
        
        $deli->delete();
        return $this->showCompletedDelivery();
        
    }

    function showMap($did){
        $mapLoc=Order::find($did);
        $lat=$mapLoc->lat;
        $long=$mapLoc->long;
        JavaScript::put([
            'lat' => $lat,
            
            'lng' => $long
        ]);
        return view('restaurant.gMap');
    }

    public function exportDelivery(){
        return Excel::download(new OrderExport,'deleiveries.xlsx');
    } 
}
