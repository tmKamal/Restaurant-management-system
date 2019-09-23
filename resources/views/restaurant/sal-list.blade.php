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
    <div class="jumbotron text-center">
        <h1>Salary Pay Dashboard</h1>
    </div>

    <div class="table-responsive">
        <table id="mytable" class="table table-striped">
            <thead class="thead-dark">
            <th>Employee ID</th>
            <th>Employee</th>
            <th>Total</th>
            <th>Month</th>
            <th>OT Hours</th>
            <th>Salary status</th>

            </thead>
            <tbody>

            {{--array_combine($users, $salarypay) as $x => $y--}}
                @foreach($users as $x)
                    <tr>
                    <th scope="row">{{$x->id}}</th>
                    <td><a href="/salarypay/{{$x->id}}" >{{$x->name}}  {{$x->lastName}} </a></td>
                        <td>$$$$</td>
                    <td>{{$x->month}}</td>
                    <td>{{$x->otHour}}</td>
                    <td>{{$x->paidStatus}}</td>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
@endsection


</body>