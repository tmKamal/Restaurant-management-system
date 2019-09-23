@extends('layouts.admin')
@section('content')
    <div class="container">
        <div col-md-24>
            <div class="textR">
                <h6>All ready registered Events </h6>
            </div>
            <table class="table table-bordered">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Type</th>
                <th>Message</th>
                <th>Action</th>
                @foreach($data as $Event)
                    <tr>
                        <td>{{$Event->id}}</td>
                        <td>{{$Event->name}}</td>
                        <td>{{$Event->email}}</td>
                        <td>{{$Event->phone}}</td>
                        <td>{{$Event->date}}</td>
                        <td>{{$Event->time}}</td>
                        <td>{{$Event->location}}</td>
                        <td>{{$Event->type}}</td>
                        <td>{{$Event->massage}}</td>
                        <td><a class=" btn btn-outline-primary " href="/EditEvent/{{$Event->id}}/Edit">Edit</a> </td>
                        <td><a class=" btn btn-danger " href="/DeleteEvent/{{$Event->id}}/Delete">Delete</a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection
