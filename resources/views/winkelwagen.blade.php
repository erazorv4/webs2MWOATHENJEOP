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


			@if(!empty(session('shopping_cart')))
			<div class="shoppingcartProducts">
                <?php $total = 0 ?>
				@foreach(session('shopping_cart') as $key => $item)
					<div class="row">
				<!-- winkelwagen item -->
					<div class="col-md-4 col-sm-6">
						<p><b>{{ $item[1] }}</b></p>
					</div>
					<div class="col-md-3 col-sm-2 divRight">
						<form method="post" action="{{ route('EditItem', $key) }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<p>
								<b>Aantal: </b><input class="shoppingcartAmount" name="quantity" type="number" min="1" value="{{ $item[3] }}" />
								<input type="submit" value="Opslaan"/>
							</p>
						</form>

					</div>

					<div class="col-md-3 col-sm-4 divRight">
						<p><b>Totaal Prijs: € </b>{{ $item[2] * $item[3] }}</p>
					</div>
					<div class="col-md-2 divRight">
						<p><a href="{{ route('RemoveItem', $key) }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></p>
					</div>
					<!-- eind winkelwagen item -->
                    <?php $total = $total + ($item[2] * $item[3]) ?>
					</div>
				@endforeach
			</div>
					<div class="row">
						<div class="shoppingcartTotalPrice">
							<h3>Totaal: € {{ number_format($total, 2) }}</h3>
						</div>
						<div class="shoppingcartPayment">
							<form method="post" action="{{ route('PurchaseItems') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" name="purchase" style="margin-top:5px;" class="btn btn-success" value="Purchase" />
							</form>
						</div>

					</div>
				@else
				<p>Je hebt nog geen producten in je winkelwagen!</p>
			@endif
		</div>
	@include('layouts.footer')
	</body>
</html>