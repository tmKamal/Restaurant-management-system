@extends('layouts.admin')
@section('content')

@include('inc.messages')

{!! Form::open(['action' => ['UtilityController@update',$utility->id],'method' => 'POST']) !!}
{!! Form::open(['url' => 'createUtility/submit']) !!}
<div class = "form-group">
        {{Form::label('expenseName', 'Expense Name')}}
        {{Form::text('expenseName',  $utility->expenseName,['class'=>'form-control','placeholder' => 'Enter expense Name'])}}
    </div>

    <div class = "form-group">
        {{Form::label('type', 'Expense Type')}}
        {{Form::select('type', ['Fixed expenses' => 'Fixed expenses', 'Variable expenses' => 'Variable expenses'])}}
    </div>

    <div class = "form-group">
        {{Form::label('date', 'Date')}}
        <!-- {{Form::date('date', \Carbon\Carbon::now())}} -->
        {{Form::date('date',$utility->date, array('class' => 'form-control', 'required' => '')) }}
    </div>

    <div class = "form-group">
        {{Form::label('payamount', 'Paid')}}
        {{Form::number('amount', $utility->amount,['class'=>'form-control','placeholder' => 'Enter paid Amount'])}}
    </div>

    
    {{-- <div class = "form-group">
        {{Form::label('note', 'Note')}}
        {{Form::text('note', $utility->note,['class'=>'form-control','placeholder' => 'Add Notes here'])}}
    </div> --}}

    <div>
    {{Form::hidden('_method','PUT')}}
        {{Form::submit('Update',['class' =>'btn btn-primary'])}}

    </div>


    


    
{!! Form::close() !!}





@endsection