@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">Ajouter un matelas</h1>

@foreach ($errors->all() as $error)
    <p class="text-red-500">{{ $error }}</p>
@endforeach

<form action="" method="post">

@csrf

<div>
    <label for="nom">Nom du matelas * :</label>
    <input type="text" name="nom" id="nom" value="{{old('nom')}}">
</div>
<div>
    <label for="brand">Marque * :</label>
    <select name="brand" id="brand">
        <option value="">Choisir une marque</option>
        @foreach ($brands as $brand)
            <option value="{{$brand->id}}" @selected($brand->id == old('brand'))>{{$brand->name}}</option>
        @endforeach
    </select>
</div>

<div class="flex items-center gap-8">
    <p>Dimensions :</p>
    <div>
        <label for="largeur">Largeur (cm) * :</label>
        <select name="largeur" id="largeur">
            <option value="">Choisir une largeur</option>
            @foreach ($largeurs as $largeur)
                <option value="{{$largeur->id}}" @selected($largeur->id == old('largeur'))>{{$largeur->value}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="longueur">Longueur (cm) * :</label>
        <select name="longueur" id="longueur">
            <option value="">Choisir une longueur</option>
            @foreach ($longueurs as $longueur)
                <option value="{{$longueur->id}}" @selected($longueur->id == old('longueur'))>{{$longueur->value}}</option>
            @endforeach
        </select>
    </div>
</div>

<div>
    <label for="prix">Prix (€) * :</label>
    <input type="number" name="prix" id="prix" value="{{old('prix')}}" min="1" max="9999">
</div>
<div>
    <label for="remise">Remise (%) :</label>
    <input type="number" name="remise" id="remise" value="{{old('remise')}}" min="0" max="100">
</div>
<div>
    <label for="image">Image (URL) * :</label>
    <input type="text" name="image" id="image" value="{{old('image', 'https://via.placeholder.com/640x480.png/007766?text=facere')}}">
</div>
<button>Ajouter</button>
</form>

@endsection