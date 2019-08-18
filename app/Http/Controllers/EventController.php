<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function submit(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone'=>'required',
            'time'=>'required',
            'location'=>'required',
            'type'=>'required',
            'message'=>'required'

            ]);

        return 'hureee';
    }
}
