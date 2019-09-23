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
    @include('includes.messages')
    <div class=" container">
        <div class="lead">
            <h2>Setup/Update Employee Details</h2>
            {{ Form::open(array('url' => 'employee/submit')) }}

            <div class="form-group">
                {{Form::label('Employee Type','Employee Type ')}}
                {{Form::text('empType', '' , ['class' => 'form-control', 'placeholder' => 'Assistant'])}}
            </div>
            <div class="form-group">
                {{Form::label('basicSalary','Basic Salary ')}}
                {{Form::number('basicSal', '' , ['class' => 'form-control', 'placeholder' => '10000LKR'])}}
            </div>
            <div class="form-group">
                {{Form::label('otRate','OT Rate ')}}
                {{Form::number('otRate', '', ['class' => 'form-control', 'placeholder' => '125LKR'])}}
            </div>
            <div>
                {{Form::submit('Submit', ['id' => 'setup'])}}
            </div>

            {{ Form::close() }}
        </div>
    </div>


    {{--@section('emp_sidebar')--}}
    {{--@parent--}}
    {{--@endsection--}}
@endsection


</body>
