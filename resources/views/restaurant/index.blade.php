@extends('includes.header')

<body>
<div class="container-fluid pl-0 pr-0">
    @include('includes.navbar')
</div>

<div class="main-img">

</div>
<div class="container mt-2">
    @include('layouts.messages')
</div>
        <div class="container">
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-3 col-sm-4">
                        <div class="card food-item" >
                            <img src="https://assets3.thrillist.com/v1/image/2797371/size/tmg-article_default_mobile.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->itemname}}</h5>
                                <p class="card-text">{{$item->status}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$item->price}}/=</li>

                            </ul>
                            <div class="card-body">
                                {{--<a href="/buyNow/{{$item->id}}" class="card-link btn btn-success">BUY</a>--}}
                                <a href="/addToCart/{{$item->id}}" class="card-link btn btn-success">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    <div class="container">
        <?php
            $i=1;
            while($i<=2){
                echo "<div class='row mt-4'>";

        $j = 1;
        while($j<=4){?>
        <div class="col-md-3 col-sm-4">
            <div class="card food-item" >
                <img src="https://assets3.thrillist.com/v1/image/2797371/size/tmg-article_default_mobile.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Fresh</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">1200.00/=</li>

                </ul>
                <div class="card-body">
                    <a href="/cart" class="card-link btn btn-success">BUY</a>
                    <a href="/cart" class="card-link btn btn-success">ADD TO CART</a>
                </div>
            </div>
        </div>

        <?php
            $j++;
            }
            echo "</div>";
        $i++;
            }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>