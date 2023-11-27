@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">Ajouter un matelas</h1>

@foreach ($errors->all() as $error)
    <p class="text-red-500">{{ $error }}</p>
@endforeach

<form action="" method="post">

@csrf

<div>
    <label for="name">Nom du matelas * :</label>
    <input type="text" name="name" id="name" value="{{old('name')}}">
</div>
<div>
    <label for="brand">Marque * :</label>
    <select name="brand" id="brand">
        <option value="">Choisir une marque</option>
        @foreach ($brands as $brand)
            <option value="{{$brand}}" @selected(old('brand') == "{{$brand}}")>{{$brand}}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="dimension">Dimensions * :</label>
    <select name="dimension" id="dimension">
        <option value="">Choisir une dimension</option>
        @foreach ($dimensions as $dimension)
            <option value="{{$dimension}}" @selected(old('dimension') == "{{$dimension}}")>{{$dimension}}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="price">Prix (€) * :</label>
    <input type="number" name="price" id="price" value="{{old('price')}}" min="1" max="9999">
</div>
<div>
    <label for="price">Remise (%) :</label>
    <input type="number" name="price" id="price" value="{{old('price')}}" min="0" max="100">
</div>
<div>
    <label for="image">Image (URL) * :</label>
    <input type="text" name="image" id="image" value="{{old('image', 'https://via.placeholder.com/640x480.png/007766?text=facere')}}">
</div>
<button>Ajouter</button>
</form>

@endsection