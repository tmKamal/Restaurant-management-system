@extends('layouts.admin')

@section('content')

    {!! Form::open(['action' => ['InventoryController@update', $item -> id],'method' => 'POST']) !!}
    <div class="container">
        <div class="row">
         <div class="col-md-12">
                <h1>Edit Product</h1>
         </div>
        </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="row event-form-wrap">
                            <div class="divider"></div>
                        <div class="col-md-6 left-side">
                                <div class="form-group">
                                    {{Form::label('pName','Enter Product Name')}}
                                    {{Form::text('pName', $item->pName,['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('bName','Enter Brand Name')}}
                                    {{Form::text('bName', $item->bName,['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('qty','Enter Quantity')}}
                                    {{Form::number('qty', $item->qty,['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('cat','Category')}}
                                    {{Form::select('cat', array('Bakery' => 'Bakery', 'Soft-Drink' => 'Soft-Drink', 'Desert' => 'Desert'))}}
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
                                {{Form::hidden('_method','PUT')}}
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
