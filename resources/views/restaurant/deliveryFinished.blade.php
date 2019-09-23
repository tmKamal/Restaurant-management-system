@extends('layouts.admin')
@section('content')
<div class="mb-4">
    <div class="row">
      <div class="col-md-6">
          <h2>Completed Deliveries</h2>  
          <button type="submit" class="btn btn-success"><a href="/exportDeliveryExcel">Export Excel</a></button>
      </div>
      <div class="col-md-6">
          
      </div>
    </div>
    
</div>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($deliverys as $item)
            <tr>
            <td scope="row">{{$item->id}}</td>
                <td>{{$item->itemname}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->address}}</td>
                <td><button type="submit" class="btn btn-outline-success"><a href="/delivery/{{$item->id}}/remove">Remove</a></button></td>  
            </tr>      
        @endforeach
    </tbody>
  </table>

@endsection