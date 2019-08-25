@extends('layouts.admin')
@section('content')
<div class="mb-4">
    <h2 >Employee Details</h2>
    
</div>

<table class="table table-striped">
    <thead>
      <tr>
        
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Type</th>
        <th scope="col">Edit</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($emp as $item)
            <tr>
            <td scope="row">{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->type}}</td>
            <form action="/emp/{{$item->id}}/update" method="POST">
                <input type="hidden" name="hidDat" value="gottit">
                    @csrf
                    <td><div class="form-group">
                            
                            <select name="etype" id="etype" class="form-control" id="exampleFormControlSelect1">
                                <option value="cashier">Cashier</option>
                                <option value="driver">Driver</option>
                                <option value="chef">Chef</option>
                                <option value="headchef">Head Chef</option>
                            </select>
                          </div></td>
                    <td><button type="submit" class="btn btn-outline-info">Update</button></td>
                </form>
                
            </tr>      
        @endforeach
      
      
    </tbody>
  </table>

@endsection