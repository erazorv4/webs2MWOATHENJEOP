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
@include('layouts.cms_navigation', array('currentPage'=>'Categories'))
<div class="container-cms">
    @php
        $CatMainArray = App\Category::getAllCategoryArray();
    @endphp
    <h2 style="display:inline-block"><b>Categorie beheer</b> &nbsp</h2>
    <h2 style="display: inline-block;" class="greenText"> {{ $message }}</h2>
    <br>
    @foreach ($CatMainArray as $data)

        {{ Form::open(['route' => 'cms_categories_store']) }}
        @php
            if ($data->parent_id != null) {
                echo "&emsp; &emsp; ";
            }

            $options = ["" => ""] + App\Category::where('id', '<>', $data->id)->whereNull('parent_id')->pluck('name', 'id')->all()
        @endphp

        {{ Form::hidden('id', $data->id) }}
        Naam: {{ Form::text('name', $data->name) }}
        Zichtbaar {{ Form::checkbox('visible', 1, $data->visible) }}
        Item van {{  Form::select('parent_id', $options, $data->parent_id, array('class' => 'formText'))}}

        <input class="btn btn-primary"  type="submit" name="store" id="store" value="Opslaan">

        {{ Form::close() }}
        <br>

    @endforeach


</div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>