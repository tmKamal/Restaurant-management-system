@extends('includes.header')

<body>
<div class="container-fluid pl-0 pr-0">
    @include('includes.navbar')
</div>
<div class="jumbotron text-center" style="font-size: 8vh"> Payments</div>
<div class="row justify-content-center">
    <!--Custom page content-->

    <div class="main_content col-lg-9 col-md-12 col-sm-12 ">

        <div class="mb-4">
            <h2 >Mark your Delivery location</h2>
        </div>


        <div id="map"></div>
        <div id="content">

        </div>

    </div>
    <!--Main content end-->
    <!--END-Custom page content-->
</div>


<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted text-uppercase">{{\Illuminate\Support\Facades\Auth::user()->name}}'s Bill</span>
                <span class="badge badge-secondary badge-pill">{{count($items)}}</span>
            </h4>
            <ul class="list-group mb-3">
                @if(!count($items))
                    <script>
                        window.setTimeout(function () {
                            window.history.back();
                        }, 1000);
                    </script>
                @endif
                @php($total=0)
                @foreach($items as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$item->itemname}}</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">LKR @php($price = $item->price * $item->qty){{$price}}</span>
                    </li>
                    @php($total += $price)
                @endforeach

                <li class="list-group-item d-flex justify-content-between text-primary">
                    <span>Total :</span>
                    <strong>LKR {{$total}}</strong>
                </li>
            </ul>


        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>

            <form class="needs-validation" novalidate="" action="https://sandbox.payhere.lk/pay/checkout" method="post">
                {{csrf_field()}}
                <input type="hidden" name="merchant_id" value="1212949">    <!-- Replace your Merchant ID -->
                <input type="hidden" name="return_url" value="https://dasunekanayake.com/returnSuccess">
                <input type="hidden" name="cancel_url" value="https://dasunekanayake.com/cancel">
                <input type="hidden" name="notify_url" value="https://dasunekanayake.com/notify">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="username">First Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="firstname" name="first_name" placeholder="FirstName" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                First Name is required.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username">Last Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="lastname" name="last_name" placeholder="LastName" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Last Name is required.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="latVal">Latitude</label>
                        <input type="text" class="form-control" id="latVal" placeholder="" required="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="langVal">Longitude</label>
                        <input type="text" class="form-control" id="langVal" placeholder="" required="">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required="">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                    <div class="invalid-feedback">
                        Please select a valid city.
                    </div>
                </div>


                <div class="mb-3">
                    <label for="zip">Telephone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="phone" required="">
                    <div class="invalid-feedback">
                        Please select a valid Telephone.
                    </div>
                </div>


                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>

                <hr class="mb-4">




                {{--<div class="row" id="pay-details">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="" value="Name" onclick="this.value=''">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="" value="CC" onclick="this.value=''">
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row" id="pay-details1">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="" value="EXP" onclick="this.value=''">
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="" value="CVV" onclick="this.value=''">
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>--}}
                <hr class="mb-4">

                <div class="mb-3 d-none">
                    <input type="hidden" name="currency" value="LKR">
                    <input type="hidden" name="order_id" value="7788">
                    <input type="hidden" name="country" value="Sri Lanka"><br><br>
                    <input type="hidden" name="items" value="Deliverables"><br>
                    @php($count=1)
                    @foreach($items as $item)

                        <input type="hidden" name="item_number_{{$count}}" value="{{$item->id}}"><br>
                        <input type="hidden" name="item_name_{{$count}}" value="{{$item->itemname}}"><br>
                        <input type="hidden" name="amount_{{$count}}" value="@php($price = $item->price * $item->qty){{$price}}"><br>
                        <input type="hidden" name="quantity_{{$count}}" value="{{$item->qty}}"><br>
                        @php($count+=1)
                    @endforeach

                    <input type="hidden" name="amount" value="{{$total}}">

                </div>
                <button class="btn btn-primary btn-lg btn-block " id="card-pay" type="submit">Continue to checkout</button>


            </form>
            <button class="btn btn-light btn-lg btn-block" id="demo" onclick="demodetails()">Demo</button>


        </div>
    </div>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    function demodetails() {
        document.getElementById('firstname').value = "john";
        document.getElementById('lastname').value = "Doe";
        document.getElementById('email').value = "johndoe@gmail.com";
        document.getElementById('address').value = "Wehera,Kurunegala";
        document.getElementById('city').value = "Kurunegala";
        document.getElementById('phone').value = "0715969444";
    }
</script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdzFLvmBoH_1QzB7xelo7jO1ZoKgvUvog&callback=initMap"
        async defer></script>
<script src="js/gMapInsert.js"></script>
<script src="js/main.js"></script>
</body>

</html>