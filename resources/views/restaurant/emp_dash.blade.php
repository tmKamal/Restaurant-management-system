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

                        @if(count($employee)>0)
                            @foreach($employee as $salary)
                        <tr>
                            <td><a href="employee/{{$salary->id}}">{{$salary->empType}}</a> </td>
                            <td>{{$salary->basicSal}} LKR</td>
                            <td>{{$salary->otRate}} LKR</td>
                            {{--<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="employee/{{$salary->id}}"> <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >VIEW</button></a></p></td>--}}
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


</body>
