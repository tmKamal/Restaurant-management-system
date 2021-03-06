<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $items = DB::table('item')->select('id','itemname','price','status')->get();
        return view('restaurant.index')->with('items',$items);

        return view('home');

    }

    public function searchx(Request $request)
    {
        $items = DB::table('menus')->where('name', 'like', '%' . $request->foodItemCheck . '%')->get();

        return view('restaurant.searchMenuItem')->with('menus',$items);

    }

    public function searchxget($id)
    {
        $items = DB::table('menus')->where('name', 'like', '%' . $id . '%')->get();

        return response()->json(["result"=>$items]);

    }
}
