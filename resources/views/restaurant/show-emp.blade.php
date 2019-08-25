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
    <a class="btn btn-default" href="/emp">Go Back</a>
    <hr>
    <h2>{{$employee->empType}}</h2>
    <br>
    <p>Basic Salary : {{$employee->basicSal}}</p>
    <p>O.T. Rate : {{$employee->otRate}}</p>

@endsection


</body>