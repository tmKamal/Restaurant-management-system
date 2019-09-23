@extends('layouts.admin')
@section('content')
<div class="mb-4">
    <h2 >menu Details</h2>
    
</div>

<table class="table">
    <thead>
      <tr>
        
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($menus as $item)
            <tr>
            <td scope="row">{{$item->name}}</td>
                <td>{{$item->category}}</td>
                <td>{{$item->price}}</td>
                <td><button type="submit" class="btn btn-outline-info"><a href="/menu/{{$item->id}}/update">Update</a> </button></td>
                <td><button type="submit" class="btn btn-outline-danger"><a href="/menu/{{$item->id}}/delete">Delete</a></button></td>
                
            </tr>      
        @endforeach
      
      
    </tbody>
  </table>

@endsection