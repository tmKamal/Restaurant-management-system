<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{
    function index(){
        return view('restaurant.menu');
    }

    function submit(Request $request){
        $data=$request->all();
        $menuN=new Menu;
        $lastid =0;
   

        $file=$request ->file('image');
        $menu=DB::select('select * from menus ORDER BY id DESC LIMIT 1');
        $name="panding";
        $type=$file->guessExtension();
        foreach($menu as $menuss)
        {
            $lastid=$menuss->id;
        }
        $lastid=$lastid;
        $name=$lastid."pic.".$type;
        $file->move('image/menus',$name);

        $menuN->category=$data['prodCategory'];
        $menuN->name=$data['name'];
        $menuN->price=$data['price'];
        $menuN->image=$name;
        $menuN->save();

        return redirect('/menuDetails');
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
    function update($mId){
        // $data=request()->all();
        // $menu = Menu::find($mId);

        // $menu->category=$data['prodCategory'];
        // $menu->name=$data['name'];
        // $menu->price=$data['price'];
        // $menu->save();

        // return view('update')->with('menus',$menu);

        $menu= Menu::find($mId);
        return view('Restaurant.update')->with('menus',$menu);
    }
    public function menuUpdate($mId){
        
        $data=request()->all();
        $menu = Menu::find($mId);
        $menu->category=$data['prodCategory'];
        $menu->name=$data['name'];
        $menu->price=$data['price'];
        $menu->save();
        return $this->details();




}
}   