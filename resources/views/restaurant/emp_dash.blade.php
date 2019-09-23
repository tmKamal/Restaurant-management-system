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

    <div class="jumbotron text-center">
        <h1>Employee Dashboard</h1>

    </div>

    <div class=" container">
        <div class="lead">
            <div class="col-md-12">
                <h3>Salary Distribution</h3>
                <a href="/emp-form" id="setup" class="float-right">+ Add New Record</a>
                <br>
                <div class="table-responsive">
                    <table id="mytable" class="table table-striped">
                        <thead>
                        <th>Employee Type</th>
                        <th>Basic Salary</th>
                        <th>O.T. Rate</th>
                        {{--<th>Action</th>--}}
                        </thead>
                        <tbody>

                        @if(count($salaries)>0)
                            @foreach($salaries as $salary)
                        <tr>
                            <td><a href="employee/{{$salary->id}}">{{$salary->empType}}</a> </td>
                            <td>{{$salary->basicSal}} LKR</td>
                            <td>{{$salary->otRate}} LKR</td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class=" container">
        <div class="lead">
            <div class="col-md-12">
                <h3>Mark Salaries</h3>
                <br>
                <a href="/sal-add" id="setup" class="float-left">Mark Salary Details</a>
                <a href="/sal-list" id="setup" class="float-right">View</a>
                <br>
                <div class="table-responsive">
                    <table id="mytable" class="table table-striped">
                        <thead>
                        <th>Employee ID</th>
                        <th>Employee</th>
                        <th>Type</th>

                        </thead>
                        <tbody>

                        {{--array_combine($users, $salarypay) as $x => $y--}}
                        @foreach($users as $x)
                            <tr>
                                <th scope="row">{{$x->id}}</th>
                                <td>{{$x->name}}  {{$x->lastName}}</td>
                                <td>{{$x->type}}</td>

                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    </div>
@endsection

</body>
