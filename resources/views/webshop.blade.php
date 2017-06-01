<?php
use App\ShopItemNames;

$products = App\Product::all();
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

@include('layouts.header', array('title'=>'webshop'))

<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                <a href="product/{{$product->id}}">
                    <img src="img/WebshopImages/Shop{{$product->id}}.jpg" style="width: 100%;">
                    <br>
                    {{$product->name}}
                </a>
            </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')
</body>
</html>
