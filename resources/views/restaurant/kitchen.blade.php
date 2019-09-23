@extends('layouts.admin')
@section('content')

    
    <!--table start -->
<div class="container">
  <div class="row">
    <legend>ACTIVE ORDERS</legend>
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Order No</th>
        <th scope="col">Item</th>
        <th scope="col">Qty</th>
        <th scope="col">Chef</th>
        <th scope="col">Order Status</th>
        <th scope="col">Type</th>
        <th scope="col">Select Chef</th>
        <th scope="col">Action</th>

      </tr>
    </thead>

    <tbody>

    @foreach($orders as $x)
      <tr>
        <th scope="row">{{$x->id}}</th>
        <td> {{$x->itemname}} </td>     
        <td> {{$x->qty}} </td>  
        <td> {{$x->chefid}} </td>        
        <td>
        <span class="badge badge-info">In Queue</span>
        </td>
        <td>{{$x->type}} </td>
        <td>
        <form action="/kitchen/{{$x->id}}/assign" method="POST">
        @csrf
        
            <div class="form-group">
            
            <select name="assignChef" class="form-control" id="exampleFormControlSelect1">
                @foreach($chefs as $y)
                <option>{{$y->name}}</option>
                @endforeach
            </select>
            </div>
        
        
        </td>
        <td>
          
          <button type="submit" class="btn btn-success">Assign Chef</button>
          </form>
          <button type="button" class="btn btn-info">Start</button>
          <button type="button" class="btn btn-danger">Complete</button>
          <button type="button" class="btn btn-warning">Info</button>

        </td>
      </tr>
      @endforeach
     
    </table>

    </tbody>
  </div>

</div>




  <!--table end -->
  
  

@endsection
