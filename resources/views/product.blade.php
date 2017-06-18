<?php
use App\ShopItemNames;

?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'product'))

<div class="container">
    <div class="row">

        @if ($Id !== null)
            @php
                $product = App\Product::find($Id);
            //!! not sure if this is allouwed!!
            @endphp

            <h3>{{$product->name}}</h3>

            <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                <img src="../img/WebshopImages/{{$product->image}}" style="width: 50%;">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                <br>
                <p>€{{$product->price}}</p> <br>
                <p>{{$product->description}}</p>
            </div>
        @else
            <h3>Product niet gevonden</h3>
        @endif

    </div>
</div>
@include('layouts.footer')
</body>
</html>