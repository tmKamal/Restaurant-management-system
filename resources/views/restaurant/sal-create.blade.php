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
    <a href="/emp" class="btn btn-outline-secondary">Go back</a>
    <hr>
<h2>Create New Employee Pay Details</h2>
<hr>
    {{ Form::open(['action' => 'EmployeeController@store', 'method' => 'POST']) }}
        {{Form::bsText('empType')}}
        {{Form::bsNumber('basicSal')}}
        {{Form::bsNumber('otRate')}}
        {{Form::bsSubmit('Submit', ['id' => 'setup'])}}
    {{ Form::close() }}


@endsection


</body>