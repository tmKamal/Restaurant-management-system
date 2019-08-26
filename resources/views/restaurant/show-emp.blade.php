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
    <p>Basic Salary : {{$employee->basicSal}}</p>
    <p>O.T. Rate : {{$employee->otRate}}</p>
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
            <thead>
            <th>Employee ID</th>
            <th>Employee</th>
            <th>Salary status</th>
            <th>More</th>
            </thead>
            <tbody>
            {{--@if(count($employee)>0)--}}
                {{--@foreach($employee as $salary)--}}
                    {{--<tr>--}}
                        {{--<td><a href="employee/{{$salary->id}}">{{$salary->empType}}</a> </td>--}}
                        {{--<td>{{$salary->basicSal}} LKR</td>--}}
                        {{--<td>{{$salary->otRate}} LKR</td>--}}
                        {{--<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="employee/{{$salary->id}}"> <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >VIEW</button></a></p></td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
            {{--@endif--}}
            </tbody>
        </table>
    </div>

@endsection


</body>