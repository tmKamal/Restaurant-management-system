@extends('layouts.admin')
@section('content')
<!--form-->
  <h1>Inventory</h1>
  <div align="right">
    <a href="/addItem"><button class="button button1" type="button" name="Add_Product" >+Add Product</button></a>
  </div><br>
  @if(count($inventory) > 0)
      <div class="well">
        <table class="zui-table" style="width:100%" >
          <thead>
          <tr>
            <th><h5>ID</h5></th>
            <th><h5>Product Name</h5></th>
            <th><h5>Brand Name</h5></th>
            <th><h5>Quantity</h5></th>
            <th><h5>Category</h5></th>
            <th><h5>Ordered Date</h5></th>
            <th><h5>Arrived Date</h5></th>
            <th><h5>Expire Date</h5></th>
            <th><h5>Manufactured Date</h5></th>
          </tr>
        </thead>
        @foreach($inventory as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td><a href="inventory/{{$item->id}}">{{$item->Product_Name}}</a></td>
            <td>{{$item->Brand_Name}}</td>
            <td>{{$item->Quantity}}</td>
            <td>{{$item->Category}}</td>
            <td>{{$item->Ordered_Date}}</td>
            <td>{{$item->Arrived_Date}}</td>
            <td>{{$item->Expire_Date}}</td>
            <td>{{$item->Manufactured_Date}}</td>
          </tr>
        @endforeach
        </table>
      </div>
  @endif
@endsection
