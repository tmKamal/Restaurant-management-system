<!DOCTYPE html>
<html lang="en">
@extends('layouts.emp')

<head>
    <link rel="stylesheet" href="css/emp.css">
    <title>Employee Management</title>

    @include('includes.header')
    @include('includes.navbar')
</head>
<body>

@section('content')
    <h2>Pay Salary</h2>

    <br>
    {{--<h3>Current Employee   {{$users->id}}</h3>--}}


    {{ Form::open(['action' => 'SalaryPayController@store', 'method' => 'POST']) }}

        <div class="form-group">
            {{Form::label('empId','Employee ID')}}
            {{Form::number('empId','',['class' => 'form-control','placeholder' => 'Employee id', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('paidStatus','Paid Status')}}
            {{Form::text('paidStatus','' ,['class' => 'form-control','placeholder' => 'PAID', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('month','Month')}}
            {{Form::number('month', '',['class' => 'form-control','placeholder' => '01-12', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('otHour','OT Hours')}}
            {{Form::number('otHour', '',['class' => 'form-control', 'required'])}}
        </div>
        <div class="submit">
            {{Form::submit('Submit',['id' => 'setup'])}}
        </div>

    {{ Form::close() }}

@endsection


</body>