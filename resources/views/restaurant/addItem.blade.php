@extends('layouts.admin')

@section('content')

    {!! Form::open(['action' => 'InventoryController@store','method' => 'POST']) !!}
    <div align="right">
          <a class="button button1" href="/inventory">Go Back</a>
    </div>
    <div class="container">
        <div class="row">
         <div class="col-md-12">
                <h1>Add Product</h1>
         </div>
        </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="row event-form-wrap">
                            <div class="divider"></div>
                        <div class="col-md-6 left-side">
                                <div class="form-group">
                                    {{Form::label('pName','Enter Product Name')}}
                                    {{Form::text('pName','',['class' => 'form-control','placeholder' => 'ex:- Sprite','required'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('bName','Enter Brand Name')}}
                                    {{Form::text('bName','',['class' => 'form-control','placeholder' => 'ex:- Coca-Cola','required'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('qty','Enter Quantity')}}
                                    {{Form::number('qty','',['class' => 'form-control','placeholder' => 'ex:- 100','required'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('cat','Category')}}
                                    {{Form::select('cat', array('Bakery' => 'Bakery', 'Soft-Drink' => 'Soft-Drink', 'Desert' => 'Desert'),['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('oDate','Ordered Date')}}
                                    {{Form::date('date', \Carbon\Carbon::now()->format('d/m/Y'), array('class' => 'form-control', 'required' => '')) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('aDate','Arrived Date')}}
                                    {{Form::date('date', \Carbon\Carbon::now()->format('d/m/Y'), array('class' => 'form-control', 'required' => '')) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('eDate','Expire Date')}}
                                    {{Form::date('date', \Carbon\Carbon::now()->format('d/m/Y'), array('class' => 'form-control', 'required' => '')) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('mDate','Manufactured Date')}}
                                    {{Form::date('date', \Carbon\Carbon::now()->format('d/m/Y'), array('class' => 'form-control', 'required' => '')) }}
                                </div>
                                 <div class="form-group">
                                       <div class="submit">
                                           {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                                       </div>
                               </div>
                            </div>


                    </div>
                </div>

               </div>
    </div>
    {!! Form::close() !!}
@endsection
