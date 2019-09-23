<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\SalaryPay;
use Illuminate\Support\Facades\DB;

class SalaryPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users_all = DB::table('users')->get();
        $users = DB::table('users')->join('salary_pays', 'users.id', '=', 'salary_pays.empId')->get();
        $salarypay = SalaryPay::all();
//        $users_bonus = DB::table('users')->join('salary_pays', 'users.id', '=', 'salary_pays.empId')
//            ->join('users', 'users.type', '=', 'salaries.empType')->get();  ->with('usersall', $users_bonus)

        //calculate bonus
        foreach ($users_all as $user){
            $utype = $user->type;
            $uid = $user->id;
            $salaries = DB::table('salaries')->where('empType', '=', $utype);
        }


        return view('restaurant.sal-list')->with('salarypay', $salarypay)->with('users',$users)->with('usersall',$users_all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('restaurant.sal-list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'empId' => 'required',
            'paidStatus' => 'required|string|max:4',
            'month' => 'required|integer|min:1|max:12',
            'otHour' => 'required|integer|min:0'
        ]);

        $salarypay = new SalaryPay;

        $salarypay->empId = $request->input('empId');
        $salarypay->paidStatus = $request->input('paidStatus');
        $salarypay->month = $request->input('month');
        $salarypay->otHour = $request->input('otHour');

        $salarypay->save();

        return redirect('/sal-list')->with('success', 'record created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $salarypay = SalaryPay::all();
        //$users = DB::table('users')->join('salary_pays', 'users.id', '=', 'salary_pays.empId')->get();
        return view('restaurant.show-salary')->with('salarypay', $salarypay);


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
        //$users = DB::table('users')->join('salary_pays', 'users.id', '=', 'salary_pays.empId')->get(); ->with('users', $users)
        return view('restaurant.edit-emp')->with('salaries', $salaries);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
