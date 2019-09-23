@extends('layouts.admin')
@section('content')
<!--form-->
<div class="col-md-8 div-center">
    <h1>Hi!! {{ Auth::user()->name }} {{ Auth::user()->lastName }}</h1>
    <h3>Welcome to the Control Panel.</h3>
    <h4> Position: {{ Auth::user()->type }}</h4>
</div>
@endsection