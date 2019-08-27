<!DOCTYPE html>
<html lang="en">
@extends('layouts.emp')

<head>
    <link rel="stylesheet" href="css/emp.css">
    <title>Employee Management</title>

    @include('includes.header')
    {{--@include('includes.navbar')--}}
</head>
<body>

@section('content')
    <a class="btn btn btn-outline-secondary" href="/emp">Go Back</a>
    <hr>
    <h2>{{$employee->empType}}</h2>
    <br>
    <table class="table table-borderless">
        <tbody>
        <tr>
            <td><p>Basic Salary</p></td>
            <td><p>{{$employee->basicSal}} LKR</p></td>
        </tr>
        <tr>
            <td><p>Over Time Rate</p></td>
            <td><p>{{$employee->otRate}} LKR</p></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <a href="/employee/{{$employee->id}}/edit" class="btn btn-outline-success">Edit</a>
    {{ Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'float-right']) }}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
    {{ Form::close() }}

    <br>
    <hr>
    <br>
    <h3>{{$employee->empType}}s List</h3>
    <br>
    <div class="table-responsive">
        <table id="mytable" class="table table-striped">
            <thead class="thead-dark">
            <th>Employee ID</th>
            <th>Employee</th>
            <th>Salary status</th>
            <th>More</th>
            </thead>
            <tbody>
                <tr>
                    <td>EMP01</td>
                    <td>Kapila Senarathna</td>
                    <td>PAID</td>
                    <td><a href="/restaurant/emp-overview">VIEW</a></td>
                </tr>
                <tr>
                    <td>EMP02</td>
                    <td>Sandun Madhushanka</td>
                    <td>UNPAID</td>
                    <td><a href="/restaurant/emp-overview">VIEW</a></td>
                </tr>
                <tr>
                    <td>EMP05</td>
                    <td>Kusal Mendis</td>
                    <td>PAID</td>
                    <td><a href="/restaurant/emp-overview">VIEW</a></td>
                </tr>
   
            </tbody>
        </table>
    </div>

@endsection


</body>