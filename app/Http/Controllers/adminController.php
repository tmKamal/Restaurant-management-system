<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\User;

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
}
