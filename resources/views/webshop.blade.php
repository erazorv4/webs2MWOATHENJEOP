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
<body >

@include('layouts.header', array('title'=>'webshop'))

<div class="container productcontainer">
    {{--{{ Form::open(['route' => 'CategoryFilter', 'id' => 'form']) }}--}}

    {{--{{ Form::select('filter', $filterOptions, $selectedFilter, array('onchange' => 'sendForm()'))}} <br><br>--}}

    {{--{{ Form::close() }}--}}
    <div class="row">
        <h3 class="title">&nbsp Webshop</h3>
        <?php
            $products = array();
            $allProducts = App\Product::all();
            $query = $_GET['query'];

            if($query != nullOrEmptyString()) {
                $query = strtolower($query);
                foreach($allProducts as $product) {
                    if (strpos(strtolower($product->name), $query) !== false || strpos(strtolower($product->description), $query) !== false) {
                        array_push($products, $product);
                    }
                }
            } else {
                $products = $allProducts;
            }
        ?>
        @if (count($products) > 0)

            @foreach($products as $product)

                @php
                    $productnr = $product->id;
                    $productTitle = $product->name;
                    $productPrice = $product->price;
                    $productDescription = $product->description;
                    $fileName = URL::asset('img/WebshopImages/'.$product->image);
                @endphp

                <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                    <a href="product/{{$productnr}}">
                    <img src="{{$fileName}}" style="width: 100%;" data-toggle='modal' data-target="#{{$productnr}}">
                    <br>
                    <br>
                    <b>Productnaam</b>: {{$productTitle}}
                    <br>
                    <b>Prijs</b>: &euro;{{ $productPrice }}
                    <br>
                    <b>Beschrijving</b>: {{$productDescription}}
                    <br></a>
                    <form method="post" action="{{ route('AddToCart') }}">
                        <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
                        <input type="hidden" name="name" value="{{ $productTitle }}" />
                        <input type="hidden" name="price" value="{{ $productPrice }}" />
                        <div class="btn-group cart">
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="id" value="{{ $productnr }}" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                        </div>
                    </form>
                </div>
            @endforeach
        @else
            <h3>Er zijn geen producten om te laten zien.</h3>
        @endif
    </div>
</div>
@include('layouts.footer')
<script> function sendForm(){document.getElementById('form').submit()}</script>
</body>
</html>
