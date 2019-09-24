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
    @include('includes.messages')

    <div class="container">
        @if(isset($users))
            <h2>Search results</h2>
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
        @endif
    </div>


@endsection

</body>
