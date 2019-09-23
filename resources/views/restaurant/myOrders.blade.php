@extends('includes.header')

<body>
<div class="container-fluid pl-0 pr-0">
    @include('includes.navbar')
</div>
<div class="jumbotron text-center" style="font-size: 8vh"> My Orders</div>

@if(!count($items))
    <script>
        window.setTimeout(function () {
            window.history.back();
        }, 5000);
    </script>
    <div class="container">sorry you did not have ordered any items yet</div>
@endif

<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Item Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Pay Status</th>

        </tr>
        </thead>
        <tbody>
        @php($c=1)
        @foreach($items as $item)
            <tr>
                <th scope="row">{{$c}}</th>
                <td>{{$item->itemname}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->qty * $item->price}}</td>
                <th scope="col"><?php
                    if($item->paystatus==1)
                        echo "Paid";
                    else
                        echo "Pending payment"
                    ?></th>

            </tr>
            @php($c+=1)
        @endforeach
        </tbody>
    </table>


</div>