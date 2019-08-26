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
    <link rel="stylesheet" href="css/updateEvent.css">
    <title>Update Event</title>
</head>
<body>
<form action="/eventsUpdate" method="post">
    {{csrf_field()}}
<div class="container">
    <div class="row">
        <div class="col-md-12  event-reg">

            <h1>Update Event</h1>
            <div class="text">
                <h6>Event registration must be completed at least 6 days prior to the event </h6>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 eventForm">

            <div class="row uevent-form-wrap">
                <div class="udivider"></div>
                    <div class="col-md-6 left-side">

                        <div class="form-group">
                         {{Form::label('name','Enter Name')}}
                            <input type="text" class="form-control" name="name" value="{{$Eventdata->name}}"/>
                            <input type="hidden" name="id" value="{{$Eventdata->id}}"/>
                         <div class="a1">
                              {{ $errors->first('name') }}
                            </div>
                     </div>
                      <div class="form-group">
                         {{Form::label('email','E-Mail Address')}}
                         <input type="email" class="form-control" name="email" value="{{$Eventdata->email}}"/>
                            <div class="a1">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('phone','Enter Phone Number')}}
                            <input type="text" class="form-control" name="phone" value="{{$Eventdata->phone}}"/>
                            <div class="a1">
                                {{ $errors->first('phone') }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('date','Event Date')}}
                            {{Form::date('date', \Carbon\Carbon::now(), array('class' => 'form-control', 'required' => '','value' => '$Eventdata->date')) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('time', 'Enter Event Start Time :') !!}
                            {!! Form::time('time',null, ['class' => 'form-control','value' => '$Eventdata->time']) !!}
                            <div class="a1">
                                {{ $errors->first('time') }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('location','Enter Event Location')}}
                            <input type="text" class="form-control" name="location" value="{{$Eventdata->location}}"/>
                            <div class="a1">
                                {{ $errors->first('location') }}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 right-side">
                        <div class="row">
                            <div class="col-md-12 submit-side">
                                <div class="form-group">
                                    {{Form::label('type','Enter Event Type')}}
                                    <input type="text" class="form-control" name="type" value="{{$Eventdata->type}}"/>

                                    <div class="a1">
                                        {{ $errors->first('type') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('message','Extra Details')}}
                                    <input type="textarea" class="form-control" name="massage" value="{{$Eventdata->massage}}"/>
                                    <div class="a1">
                                        {{ $errors->first('message') }}
                                    </div>
                                </div>
                                <div class="submit">
                                    <input type="submit" class="btn btn-primary"value="Update"/>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>




    </div>

</form>
{!! Form::close() !!}


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
