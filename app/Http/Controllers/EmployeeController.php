<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Salary;
use Illuminate\Support\Facades\DB;


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
        $users = DB::table('users')->where('type', '!=', 'User')->get(); //WHERE ADD CLAUSE
        return view('restaurant.emp_dash')->with('salaries', $salaries)->with('users',$users);

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
            'empType' => 'required',
            'basicSal' => 'integer|min:0',
            'otRate' => 'integer|min:0'
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
        $type = $salaries->empType;
        $users_all = DB::table('users')->where('type', '=', $type)->join('salary_pays', 'users.id', '=', 'salary_pays.empId')->get();
        $users = DB::table('users')->where('type', '=', $type)->get();
        //get specific ->where('type', '=', 'chef')

        return view('restaurant.show-emp')->with('salaries', $salaries)->with('users',$users)->with('usersall', $users_all);

    }

//    public function showProfile($id)
//    {
//        $salaries = Salary::find($id);
//        $users = DB::table('users')->get();
//        return view('restaurant.emp-overview')->with('salaries', $salaries)->with('users',$users);
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salaries = Salary::find($id);
        return view('restaurant.edit-emp')->with('salaries', $salaries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException

     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'empType' => 'required',
            'basicSal' => 'integer|min:0',
            'otRate' => 'integer|min:0'
        ]);

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

    public function search(Request $request)
    {
        $items = DB::table('users')->where('name', 'like', '%' . $request->q . '%')->get();
        return view('restaurant.empSearch')->with('users',$items);
    }
}
