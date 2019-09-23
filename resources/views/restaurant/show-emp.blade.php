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
    @include('includes.messages')
    <a class="btn btn btn-outline-secondary" href="/emp">Go Back</a>
    <hr>
    <h2>{{$salaries->empType}}</h2>
    <br>
    <table class="table table-borderless">
        <tbody>
        <tr>
            <td><p>Basic Salary</p></td>
            <td><p>{{$salaries->basicSal}} LKR</p></td>
        </tr>
        <tr>
            <td><p>Over Time Rate</p></td>
            <td><p>{{$salaries->otRate}} LKR</p></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <a href="/employee/{{$salaries->id}}/edit" class="btn btn-outline-success">Edit</a>
    {{ Form::open(['action' => ['EmployeeController@destroy', $salaries->id], 'method' => 'POST', 'class' => 'float-right']) }}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
    {{ Form::close() }}

    <br>
    <hr>
    <br>
    <h3>{{$salaries->empType}}s List</h3>
    <br>
    <div class="table-responsive">
        <table id="mytable" class="table table-striped">
            <thead class="thead-dark">
            <th>Employee ID</th>
            <th>Employee Name</th>
            {{--<th>Salary status</th>--}}
            </thead>
            <tbody>
                @foreach($users as $x)
                    {{--//$usersall change usersall for pay status --}}
                    <tr>
                        <th scope="row">{{$x->id}}</th>
                        <td> {{$x->name}}  {{$x->lastName}} </td>
                        {{--<td>{{$x->paidStatus}}</td>--}}
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

@endsection


</body>