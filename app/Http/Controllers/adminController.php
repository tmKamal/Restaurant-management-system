<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //Admin index view
    function index(){
        return view('restaurant.admin_panel.index');
    }
}
