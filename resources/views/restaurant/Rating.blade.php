<!doctype html>
<html lang="en">
@extends('includes.header')
<head>
    @include('includes.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

</head>
<body>
    <div align="center" style="background: #000; padding: 50px">
        <i class="fa fa-star fa-2x" data-index="0"></i>
        <i class="fa fa-star fa-2x" data-index="1"></i>
        <i class="fa fa-star fa-2x" data-index="2"></i>
        <i class="fa fa-star fa-2x" data-index="3"></i>
        <i class="fa fa-star fa-2x" data-index="4"></i>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        var ratedIndex = -1;
        $(document).ready(function () {
            resetStarColors()

            if(localStorage.getItem('ratedIndex') != null)
                setStars(parseInt(localStorage.getItem('ratedIndex')));

            $('.fa-star').on('click',function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex',ratedIndex);
            });

            $('.fa-star').mouseover(function () {
                resetStarColors()

                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);

            });
            $('.fa-star').mouseleave(function () {
                resetStarColors()

                if(ratedIndex != -1)
                   setStars(ratedIndex);
            });
        });

        function setStars(max) {
            for(var i=0; i<=max;i++)
                $('.fa-star:eq('+i+')').css('color','green');
        }

        function resetStarColors() {
            $('.fa-star').css('color','white');
        }
    </script>
</body>
</html>
