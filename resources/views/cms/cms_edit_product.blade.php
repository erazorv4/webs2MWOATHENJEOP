<?php 
	use App\Http\Controllers\ProductController;
	$controller = new ProductController();
	$formData = $controller->getFormData($Id);

$image = "";
if (isset($formData['image']))
{
	$image = $formData['image'];
}

$categoriesString = "array(";
foreach (\App\Category::all()->where("parent_id", "=", null) as $category)
{
	$categoryloopFirst = true;
	$categoriesString = $categoriesString."'".$category->name."' => array(";
	foreach (\App\Category::all()->where("parent_id", "=", $category->id) as $subCategory)
	{
		if ($categoryloopFirst)
		{
			$categoriesString = $categoriesString."'".$subCategory->id."' => '".$subCategory->name."'";
			$categoryloopFirst = false;
		}
		else
		{
			$categoriesString = $categoriesString.", '".$subCategory->id."' => '".$subCategory->name."'";
		}
	}
	$categoriesString = $categoriesString."),";
}
$categoriesString = trim($categoriesString, ",");
$categoriesString = $categoriesString.")";

$categoriesArray = eval("return ".$categoriesString.";");
?>
<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" class="html-cms">
	<head>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
		<script src="{{ URL::asset('js/app.js') }}"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body class="body-cms">
	@if (Auth::check() && Auth::user()->role == "admin")
		@include('layouts.cms_navigation', array('currentPage'=>'Shops'))

		<div class="container-cms">
			<br>
			<h2><b>Product bewerken</b></h2>
			<br>
		{{ Form::open(['route' => 'edit_product', 'files' => true]) }}

		<!-- hidden "_token" is necessary for laravel, will throw tokenmismatch exception if not included -->
			{{ Form::hidden('_token', csrf_token()) }}
			{{ Form::hidden('Id', $Id) }}

			Naam: {{ Form::text('Name', $formData['name'],array('required' => 'required')) }} <br><br>
			Prijs: <input type="number" name="Price" min="0" value="{{ $formData['price']}}" step="any" required/> <br>
			Categorie: {{ Form::select('Category', $categoriesArray, $formData['category_id']) }}<br/><br/>
			Afbeelding: <input type="file" accept=".jpeg, .jpg, .png" name="Image" value=""> <br>
			Beschrijving <br><br>
			{{ Form::textarea('Description', $formData['description'],array('required' => 'required')) }} <br>
			<input class="btn btn-primary" type="submit" value="Opslaan">

			{{ Form::close() }}

		</div>
		{{--<div class="container-cms">

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-sm-offset-1 col-xs-10 col-xs-offset-1" >

					{{ Form::open(['route' => 'edit_product']) }}
					
						<!-- hidden "_token" is necessary for laravel, will throw tokenmismatch exception if not included -->
						{{ Form::hidden('_token', csrf_token()) }}

						
						Naam: {{ Form::text('Name', $formData['name']) }} <br>
						Prijs: <input type="number" name="Price" min="0" value="{{ $formData['price']}}"/> <br>
						Beschrijving <br>
						{{ Form::textarea('Description', $formData['description'])}} <br>
						
						<input class="btn btn-primary"  type="submit" value="Opslaan">
						
					{{ Form::close() }}
					
					
				</div>

			</div>
--}}
	@else

		<script>window.location.href = "{{ route('login') }}"</script>

	@endif
	</body>
</html>