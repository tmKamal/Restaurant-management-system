<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    function index(){
        return view('restaurant.menu');
    }

    function submit(){
        $data=request()->all();
        $menuN=new Menu;

        $menuN->category=$data['prodCategory'];
        $menuN->name=$data['name'];
        $menuN->price=$data['price'];
        $menuN->save();

        return redirect('/menu');
    }

    function showIndex(){
        $menu=Menu::all();
        //dd($menu);
        return view('restaurant.index')->with('menus',$menu);
    }

    function details(){
        $menu=Menu::all();
        //dd($menu);
        return view('restaurant.menuDetails')->with('menus',$menu);
    }

    function delete($mId){
        
        $menu=Menu::find($mId);
        
        $menu->delete();
        return redirect('/menuDetails');
        
    }
}
