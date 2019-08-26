<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class EventController extends Controller
{
    public function index(){
        $data = DB::table('events')->select('id','name','email','phone','date','time','location','type','massage')->get();
        return view('restaurant.Event')->with('data',$data);
    }
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


        $Event = new Event;
        $Event -> name = $request -> input('name');
        $Event -> email = $request -> input('email');
        $Event -> phone = $request -> input('phone');
        $Event -> date = $request -> input('date');
        $Event -> time = $request -> input('time');
        $Event -> location = $request -> input('location');
        $Event -> type = $request -> input('type');
        $Event -> massage = $request -> input('message');

        $Event -> save();

        return redirect('/');
    }
    public function DeleteEvent($id){
        $Events = Event::find($id);
        $Events->delete();
        return redirect()->back();
    }
}
