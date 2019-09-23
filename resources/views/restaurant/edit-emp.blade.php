<!DOCTYPE html>
<html lang="en">
@extends('layouts.emp')

<head>
    <link rel="stylesheet" href="/css/emp.css">
    <title>Employee Management</title>

    @include('includes.header')
    {{--@include('includes.navbar')--}}
</head>
<body>

@section('content')

    {{ Form::open(['action' => ['EmployeeController@update', '$salaries->$id'], 'method' => 'POST']) }}

    <a class="btn btn-outline-secondary" href="/employee/{{$salaries->id}}">Go Back</a>
    <hr>
    <h2>Edit Employee Pay Details</h2>
    <hr>

        {{--{{Form::bsText('empType', $salaries->empType)}}--}}
        {{--{{Form::bsNumber('basicSal', $salaries->basicSal)}}--}}
        {{--{{Form::bsNumber('otRate', $salaries->otRate)}}--}}
        {{--{{Form::hidden('_method', 'PUT')}}--}}
        {{--{{Form::bsSubmit('Submit', ['id' => 'setup'])}}--}}


    <div class="form-group">
        {{Form::label('empType','Employee Type')}}
        {{Form::text('empType', $salaries->empType,['class' => 'form-control', 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('bName','Basic Salary')}}
        {{Form::number('bName', $salaries->basicSal,['class' => 'form-control', 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('qty','OT Rate')}}
        {{Form::number('qty', $salaries->otRate,['class' => 'form-control', 'required'])}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['id' => 'setup'])}}

    {{ Form::close() }}

@endsection


</body>