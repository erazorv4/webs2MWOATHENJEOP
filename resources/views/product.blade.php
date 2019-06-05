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
            @endphp

            <h3>{{$product->name}}</h3>

            <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                <img src="../img/WebshopImages/{{$product->image}}" style="width: 100%;">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                <br>
                <p>€{{$product->price}}</p> <br>
                <p>{{$product->description}}</p>
                <span class="glyphicon glyphicon-shopping-cart" ></span>
                <form method="post" action="{{ route('AddToCart') }}">
                    <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
                    <input type="hidden" name="name" value="{{ $product->name }}" />
                    <input type="hidden" name="price" value="{{ $product->price }}" />
                    <div class="btn-group cart">
                        <input required type="number" name="quantity" class="form-control" min="1" value="1" />
                        <input type="hidden" name="id" value="{{ $product->id }}" />
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                    </div>
                </form>
            </div>
        @else
            <h3>Product niet gevonden</h3>
        @endif

    </div>
</div>
@include('layouts.footer')
</body>
</html>