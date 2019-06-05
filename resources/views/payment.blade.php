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
	@include('layouts.header', array('title'=>'Winkelwagen'))

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Bedankt voor uw bestelling!</h1>
				@if(!empty(session('shopping_cart')))
                <?php $total = 0 ?>
				@foreach(session('shopping_cart') as $key => $item)
					<!-- winkelwagen item -->
						<div class="col-md-4 col-sm-6">
							<p><b>{{ $item[1] }}</b></p>
						</div>
						<div class="col-md-3 col-sm-2 divRight">
							<p><b>Aantal: </b>{{ $item[3] }}</p>
						</div>
						<div class="col-md-3 col-sm-4 divRight">
							<p><b>Totaal Prijs: € </b>{{ $item[2] * $item[3] }}</p>
						</div>
						<!-- eind winkelwagen item -->
                        <?php $total = $total + ($item[2] * $item[3]) ?>
					@endforeach
					<div class="shoppingcartTotalPrice">
						<h3>Totaal: € {{ number_format($total, 2) }}</h3>
					</div>
					<?php session()->forget('shopping_cart') ?>
					@endif
				</div>
			</div>
			<div class="row">
				<!-- products -->
			</div>
		</div>
	@include('layouts.footer')
	</body>
</html>