<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility;


class UtilityController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $utilities = Utility::all();
        //var_dump($utilities);
        return view('restaurant.utility')->with ('utilities',$utilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.createUtility');        
    }

    //Newly added Function for submit data
    public function submit(Request $request)
    {
        $this->validate($request,[
            'expenseName' => 'required',
            'type'=>'required',
            'date'=>'required',
            'amount'=>'required',
            

        ]);

        //create new Utility bill record

        $utility = new Utility;
        $utility->expenseName = $request->input('expenseName');
        $utility->category = $request->input('type');
        $utility->date = $request->input('date');
        $utility->amount = $request->input('amount');
        $utility->note = $request->input('expenseName');
        $utility->expenseName = $request->input('expenseName');
        
        //save utility
        $utility->save();
        
        //redirect
        return redirect('/utility')->with('success','Message sent');





        //return $request->input('expenseName');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utility = Utility::find($id);
        return view('restaurant.editUtility')->with('utility',$utility);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utility = Utility::find($id);
        $utility->delete();
        return redirect('/utility')->with('success','Record deleted');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $utility = Utility::find($id);  

        $utility->expenseName = $request->input('expenseName');
        $utility->category = $request->input('type');
        $utility->date = $request->input('date');
        $utility->amount = $request->input('amount');
        $utility->note = $request->input('expenseName');
        $utility->expenseName = $request->input('expenseName');
        
        //save utility
        $utility->save();

        return redirect('/utility')->with('success','Record updated');

      }
}
