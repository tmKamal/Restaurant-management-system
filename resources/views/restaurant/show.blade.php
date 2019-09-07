@extends('layouts.admin')

@section('content')
    <a class="button button1" href="/inventory">Go Back</a>
    <div align="center">
      <table class="zui-table" style="width:50%">
        <tr>
          <td><h2>Product Name :</h2></td>
          <td><h3>{{$item->Product_Name}}</h3></td>
        </tr>
        <tr>
          <td><h2>ID :</h2></td>
          <td><h3>{{$item->id}}</h3></td>
        </tr>
        <tr>
          <td><h2>Brand Name :</h2></td>
          <td><h3>{{$item->Brand_Name}}</h3></td>
        </tr>
        <tr>
          <td><h2>Quantity :</h2></td>
          <td><h3>{{$item->Quantity}}</h3></td>
        </tr>
        <tr>
          <td><h2>Category :</h2></td>
          <td><h3>{{$item->Category}}</h3></td>
        </tr>
        <tr>
          <td><h2>Ordered Date :</h2></td>
          <td><h3>{{$item->Ordered_Date}}</h3></td>
        </tr>
        <tr>
          <td><h2>Arrived Date :</h2></td>
          <td><h3>{{$item->Arrived_Date}}</h3></td>
        </tr>
        <tr>
          <td><h2>Expire Date :</h2></td>
          <td><h3>{{$item->Expire_Date}}</h3></td>
        </tr>
        <tr>
          <td><h2>Manufactured Date :</h2></td>
          <td><h3>{{$item->Manufactured_Date}}</h3></td>
        </tr>
      </table>
    </div>

    <!-- Edit button -->
    <a href="/inventory/{{$item->id}}/edit" class="button button1">Edit</a>
    {!! Form::open(['action' => ['InventoryController@destroy', $item -> id],'method' => 'POST',]) !!}
        {{Form::hidden('_method','DELETE')}}
    <!-- Delete button -->
        <div align="right">
          {{Form::submit('Delete',['class' => "button button2"])}}
        </div>
    {!! Form::close() !!}

  @endsection
