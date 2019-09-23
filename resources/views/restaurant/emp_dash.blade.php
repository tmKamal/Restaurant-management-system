<!DOCTYPE html>
<html lang="en">
    @extends('layouts.emp')

<head>
    <link rel="stylesheet" href="css/emp.css">
    <title>Employee Management</title>

    @include('includes.header')

</head>
<body>

@section('content')

    <form action="/searchemp" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search empolyees"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
        </div>
    </form>
    <br>
    @php($totalTypes=0)
    @foreach($salaries as $salary)
        @php($totalTypes += 1)
    @endforeach

    @php($totalEmps=0)
    @foreach($users as $u)
        @php($totalEmps += 1)
    @endforeach
    <div class="jumbotron text-center">
        <h1>Employee Dashboard</h1>

    </div>

    <div class="row info-cards-wrapper">
        <!-- Info-Cards-Wrapper -->
        <div class="col-xl-3 col-md-6  mb-2">
            <!-- Info-Card-Start -->
            <div class="info-card-container">
                <div class=" info-card-header row">
                    <div class="col-3 info-card-icon">
                        <i class="material-icons info-card-icon-customized">list</i>
                    </div>
                    <div class="col-9 info-card-title">
                        <h5>Employee Types</h5>
                        <h3>{{$totalTypes}}</h3>
                    </div>
                </div>
            </div>
        </div><!-- Info-card-End -->

        <!-- Info-Cards-Wrapper -->
        <div class="col-xl-3 col-md-6  mb-2">
            <!-- Info-Card-Start -->
            <div class="info-card-container">
                <div class=" info-card-header row">
                    <div class="col-3 info-card-icon">
                        <i class="material-icons info-card-icon-customized">assignment_ind</i>
                    </div>
                    <div class="col-9 info-card-title">
                        <h5>Total Employees</h5>
                        <h3>{{$totalEmps}}</h3>
                    </div>
                </div>
            </div>
        </div><!-- Info-card-End -->

    </div>


    @include('includes.messages')

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
