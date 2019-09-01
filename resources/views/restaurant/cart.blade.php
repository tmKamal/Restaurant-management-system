@extends('includes.header')

<body>
<div class="container-fluid pl-0 pr-0">
    @include('includes.navbar')
</div>
<div class="jumbotron text-center" style="font-size: 8vh"> My Cart</div>
<div class="container mt-2">
    @include('layouts.messages')
</div>
<script src="https://use.fontawesome.com/c560c025cf.js"></script>



@php($total=0)

@if(count($items))
<div class="container">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shopping cart
            <a href="/" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">

            @foreach($items as $item)
                <!-- PRODUCT -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center mb-2">
                    <img class="img-responsive" src="{{$item->image}}" alt="prewiew" width="120" height="80">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <h4 class="product-name mb-0"><strong>{{$item->itemname}}</strong></h4>
                    <h4 class="mb-0">
                        <small>Product description</small>
                    </h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong>{{$item->price}} <span class="text-muted">x</span></strong></h6>
                    </div>
                    @php($price = $item->price * $item->qty)
                    <div class="col-4 col-sm-4 col-md-4">
                        <div class="quantity">
                            <input type="button" value="+" class="plus" onclick="window.location.href='/increase/{{$item->itemid}}';">
                            <input type="number" step="1" max="99" min="1" value="{{$item->qty}}" title="Qty" class="qty"
                                   size="4">
                            <input type="button" value="-" class="minus" onclick="window.location.href='/decrease/{{$item->itemid}}';">
                        </div>
                    </div>
                    <a class="col-2 col-sm-2 col-md-2 text-right pt-1" href="/removeCartItem/{{$item->itemid}}">
                        <button type="button" class="btn btn-outline-danger btn-xs" >
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </a>
                </div>
            </div>
            <hr>
            @php($total += $price)

                <!-- END PRODUCT -->
            @endforeach

            <!-- PRODUCT -->
            {{--<div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <h4 class="product-name"><strong>Product Name</strong></h4>
                    <h4>
                        <small>Product description</small>
                    </h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4">
                        <div class="quantity">
                            <input type="button" value="+" class="plus">
                            <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                   size="4">
                            <input type="button" value="-" class="minus">
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right pt-1">
                        <button type="button" class="btn btn-outline-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr>--}}
            <!-- END PRODUCT -->
            <div class="pull-right">
                <a href="" class="btn btn-outline-secondary pull-right">
                    Update shopping cart
                </a>
            </div>
        </div>
        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        {{--<input type="text" class="form-control" placeholder="cupone code">--}}
                    </div>
                    <div class="col-6">
                        {{--<input type="submit" class="btn btn-default" value="Use cupone">--}}
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
                <a href="/payment" class="btn btn-success pull-right">Checkout</a>
                <div class="pull-right" style="margin: 5px">
                Total price: <b>{{$total}}</b>
                </div>
            </div>
        </div>
    </div>
</div>
    @else
    <main role="main" class="container">
        <div class="jumbotron">
            <h1>IT IS EMPTY HERE</h1>
            <p class="lead">Add something to your cart and comeback!</p>
            <a class="btn btn-lg btn-primary" href="/" role="button">Continue shopping »</a>
        </div>
    </main>

@endif



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>

</html>