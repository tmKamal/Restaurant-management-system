@extends('includes.header')

<body>
<div class="container-fluid pl-0 pr-0">
    @include('includes.navbar')
</div>
<div class="jumbotron text-center" style="font-size: 8vh"> Cash On Delivery</div>

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
            <form class="needs-validation" novalidate="" action="/paysuccesspost" method="post">
                {{ csrf_field() }}
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
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" required="">
                    <div class="invalid-feedback">
                        Please select a valid Telephone.
                    </div>
                </div>


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



                <button class="btn btn-primary btn-lg btn-block" id="cod-pay1" type="submit">Finish order</button>

            </form>
            <button class="btn btn-light btn-lg btn-block" id="demo" onclick="demodetails()">Demo</button>
        </div>
    </div>
</div>
<script>

    function demodetails() {
        document.getElementById('firstname').value = "john";
        document.getElementById('lastname').value = "Doe";
        document.getElementById('email').value = "johndoe@gmail.com";
        document.getElementById('address').value = "Wehera,Kurunegala";
        document.getElementById('city').value = "Kurunegala";
        document.getElementById('phone').value = "0715969444";


    }
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


</script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>

</html>