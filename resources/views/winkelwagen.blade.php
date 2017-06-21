<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
					<h1 class="text-center">Mijn winkelwagen</h1>
				</div>
			</div>
			<div class="row shoppingcartProducts">

				<!-- winkelwagen item -->
				<div class="col-md-4 col-sm-6">
					<p><b>MWOAHTENBROT</b></p>
				</div>
				<div class="col-md-3 col-sm-2 divRight">
					<p><b>Aantal: </b><input class="shoppingcartAmount" type="number" min="1" /></p>
				</div>
				<div class="col-md-3 col-sm-4 divRight">
					<p><b>Totaal Prijs: </b>€12,99</p>
				</div>
				<div class="col-md-2 divRight">
					<p><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></p>
				</div>
				<!-- eind winkelwagen item -->

				<!-- winkelwagen item -->
				<div class="col-md-4 col-sm-6">
					<p><b>MWOAHTENBROT</b></p>
				</div>
				<div class="col-md-3 col-sm-2 divRight">
					<p><b>Aantal: </b><input class="shoppingcartAmount" type="number" min="1" /></p>
				</div>
				<div class="col-md-3 col-sm-4 divRight">
					<p><b>Totaal Prijs: </b>€12,99</p>
				</div>
				<div class="col-md-2 divRight">
					<p><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></p>
				</div>
				<!-- eind winkelwagen item -->

				<!-- winkelwagen item -->
				<div class="col-md-4 col-sm-6">
					<p><b>MWOAHTENBROT</b></p>
				</div>
				<div class="col-md-3 col-sm-2 divRight">
					<p><b>Aantal: </b><input class="shoppingcartAmount" type="number" min="1" /></p>
				</div>
				<div class="col-md-3 col-sm-4 divRight">
					<p><b>Totaal Prijs: </b>€12,99</p>
				</div>
				<div class="col-md-2 divRight">
					<p><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></p>
				</div>
				<!-- eind winkelwagen item -->

			</div>
			<div class="row">
				<div class="shoppingcartTotalPrice">
					<h3>Totaal: €123</h3>
				</div>
				<div class="shoppingcartPayment">
					<button type="button" class="btn btn-default btn-lg" onclick="window.location='{{ url("payment") }}'">Betalen</button>
				</div>

			</div>

		</div>
	@include('layouts.footer')
	</body>
</html>