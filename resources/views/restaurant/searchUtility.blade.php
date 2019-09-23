@extends('layouts.admin')
@section('content')
<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Search Results</h2>
    
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Date</th>
        <th scope="col">Expenses Name</th>
        <th scope="col">Payment type</th>
        <th scope="col">Total Due</th>
        <th scope="col">Status</th>
        <th scope="col">Notes</th>
        <th scope="col">Action</th>

      </tr>
    </thead>

    <tbody>

    
    <tr>
    @foreach($details as $y)
        <td>{{$y->date}}</td>
        <td>{{$y->expenseName}}</td>
        <td> {{$y->category}}</td>
        <td>{{$y->amount}}</td>
        <td><span class="badge badge-pill badge-success">Paid</span></td>
        <td>{{$y->note}}</td>
        <td>
            
            <button type="submit" class="btn btn-success"><a href="/utility/{{$y->id}}/edit">Update</a></button>
            <button type="button" class="btn btn-danger">Delete</button>
            
        
        </td>

    </tr>
    
    @endforeach 
    </table>
    @endif
</div>
@endsection