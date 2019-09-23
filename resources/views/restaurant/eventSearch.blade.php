<!DOCTYPE html>
<html lang="en">
@extends('includes.header')
<head>
    @include('includes.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/event.css">
    <title>Event Booking</title>
</head>
<body>

<a class="button button1" href="/Event">Go Back</a>
<div align="center"></div>
<br>

<!-- Table -->
@if(isset($details))
    <h3> The Search results for your query <b>{{ $query }}</b> are:</h3>
    <br>
    <div class="well">
        <table class="zui-table" style="width:100%" >
            <thead>
            <tr>

                <th><h5>Name</h5></th>
                <th><h5>Email</h5></th>
                <th><h5>Phone</h5></th>
                <th><h5>Date</h5></th>
                <th><h5>Time</h5></th>
                <th><h5>Location</h5></th>
                <th><h5>Type</h5></th>
                <th><h5>Massage</h5></th>
            </tr>
            </thead>
            @foreach($details as $event)
                <tr>


                    <td>{{$event->name}}</td>
                    <td>{{$event->email}}</td>
                    <td>{{$event->phone}}</td>
                    <td>{{$event->date}}</td>
                    <td>{{$event->time}}</td>
                    <td>{{$event->location}}</td>
                    <td>{{$event->type}}</td>
                    <td>{{$event->massage}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($message))
    <p>{{$message}}</p>
@endif

</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
