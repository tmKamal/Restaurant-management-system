@extends('includes.header')

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="container-fluid pl-0 pr-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin">Admin</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/myorders">My Orders</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Event">Event</a>
                </li>

            </ul>

            <form class="form-inline my-2 my-lg-0" action="/menuItemSearch" method="post">
                {{csrf_field()}}
                <input class="form-control mr-sm-2" type="text" placeholder="Search" id="foodItemCheck" name="foodItemCheck" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

</div>

<div class="container">
    <img src="https://dailytimes.com.pk/assets/uploads/2018/11/21/howcuttingdo.jpg" alt="" style="width: 100%;">
</div>
<div class="container mt-3">
    @include('layouts.messages')
</div>


@if(!count($menus))
    <div id="div1" class="container mt-5">
        No results found
    </div>

    @endif
<div id="div1" class="container"> </div>
    <div class="container">
        
                <div class='row mt-4' id="menuRow">

                @foreach($menus as $menu) 
        <div class="col-md-3 col-sm-4">
        
        <div class="card food-item" >
        <img src="\image\menus\{{ $menu->image }}" alt="Pic" style="width: 100%;" class="user-profile-image">
                <div class="card-body">
                    <h5 class="card-title">{{$menu->name}}</h5>
                    <p class="card-text">{{$menu->category}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$menu->price}}/=</li>

                </ul>
                <div class="card-body">
                    
                    <button value="{{$menu->id}}" onclick="addToCart({{$menu->id}})" class="card-link btn btn-success">ADD TO CART</button>
                </div>
            </div>
        
            
        </div>
        @endforeach
        
    </div>

        <script>
            function addToCart(id){
                $.get("/addToCartPost/"+id,function(result){
                    $("#div1").html(result.msg);
                });
            }


        </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>