<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Salary;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary:: orderby('id','asc')->get();
        return view('restaurant.emp_dash')->with('employee', $salaries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //form create
        return view('restaurant.sal-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'empType' => 'required'
         ]);

         //create salaries
        $salaries = new Salary;
        $salaries->empType = $request->input('empType');
        $salaries->basicSal = $request->input('basicSal');
        $salaries->otRate = $request->input('otRate');

        $salaries->save();

        return redirect('/emp')->with('success', 'Data Recorded');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salaries = Salary::find($id);
        return view('restaurant.show-emp')->with('employee', $salaries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salaries = Salary::find($id);
        return view('restaurant.edit-emp')->with('employee', $salaries);
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

        $salaries = Salary::find($id);
        $salaries->empType = $request->input('empType');
        $salaries->basicSal = $request->input('basicSal');
        $salaries->otRate = $request->input('otRate');

        $salaries->save();

        return redirect('/emp')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salaries = Salary::find($id);
        $salaries->delete();

        return redirect('/emp')->with('success', 'Data Deleted');
    }
}
