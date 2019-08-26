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
    <a class="btn btn-outline-secondary" href="/employee/{{$employee->id}}">Go Back</a>
    <hr>
    <h2>Edit Employee Pay Details</h2>
    <hr>
    {{ Form::open(['action' => ['EmployeeController@update', '$employee->id'], 'method' => 'POST']) }}
        {{Form::bsText('empType', $employee->empType)}}
        {{Form::bsNumber('basicSal', $employee->basicSal)}}
        {{Form::bsNumber('otRate', $employee->otRate)}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::bsSubmit('Submit', ['id' => 'setup'])}}
    {{ Form::close() }}

@endsection


</body>