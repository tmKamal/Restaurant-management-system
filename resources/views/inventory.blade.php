@extends('layouts.inventory')

@section('content')
<h1>Inventory Table</h1>
@if(count($items) > 0)
  @foreach($items as $item)
    <div class="well">
      <h3>{{$item->Product_Name}}</h3>
      <h5>{{$item->Brand_Name}}</h5>
    </div>
  @endforeach
@endif
@endsection
