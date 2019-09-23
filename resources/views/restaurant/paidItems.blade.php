@extends('layouts.admin')
@section('content')
    <!--form-->
    <h1>Payment History by Payment</h1>
    <br>


    @if(count($items) > 0)
        <div class="well">
            <table class="zui-table" style="width:100%" >
                <thead>
                <tr>
                    <th><h5>ID</h5></th>
                    <th><h5>Payment ID</h5></th>
                    <th><h5>Item Name</h5></th>
                    <th><h5>Quantity</h5></th>
                    <th><h5>Item Price</h5></th>
                    <th><h5>Sub total</h5></th>

                </tr>
                </thead>
                @php($i=1)
                @foreach($items as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->paymentid}}</td>
                        <td>{{$item->itemname}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->price*$item->qty}}</td>

                        @php($i+=1)
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
@endsection
