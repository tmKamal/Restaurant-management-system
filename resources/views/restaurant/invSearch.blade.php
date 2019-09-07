@extends('layouts.admin')

@section('content')
    <!-- Go back button -->
    <a class="button button1" href="/inventory">Go Back</a>
    <div align="center">

    <!-- Table -->
    @if(isset($details))
      <h3> The Search results for your query <b>{{ $query }}</b> are:</h3>
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
        @foreach($details as $item)
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
      @elseif(isset($message))
      <p>{{$message}}</p>
  @endif
@endsection
