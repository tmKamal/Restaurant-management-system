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
    @include('includes.messages')
    {{ Form::open(['action' => ['EmployeeController@update', $salaries->id], 'method' => 'POST']) }}

    <a class="btn btn-outline-secondary" href="/employee/{{$salaries->id}}">Go Back</a>
    <hr>
    <h2>Edit Employee Pay Details</h2>
    <hr>

        {{Form::bsText('empType', $salaries->empType)}}
        {{Form::bsNumber('basicSal', $salaries->basicSal)}}
        {{Form::bsNumber('otRate', $salaries->otRate)}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::bsSubmit('Submit', ['id' => 'setup'])}}


    {{ Form::close() }}

@endsection


</body>