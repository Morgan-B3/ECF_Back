@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">Ajouter un matelas</h1>

@foreach ($errors->all() as $error)
    <p class="text-red-500">{{ $error }}</p>
@endforeach

<form action="" method="post" class="grid grid-cols-2 items-center gap-y-6 my-8 w-1/2 mx-auto">

@csrf


    <label class="w-full text-xl font-bold flex justify-center" for="nom">Nom du matelas * :</label>
    <input class="rounded-lg" type="text" name="nom" id="nom" value="{{old('nom')}}">

    <label class="w-full text-xl font-bold flex justify-center" for="brand">Marque * :</label>
    <select name="brand" id="brand" class="rounded-lg">
        <option value="" class="text-gray-600">Choisir une marque</option>
        @foreach ($brands as $brand)
            <option value="{{$brand->id}}" @selected($brand->id == old('brand'))>{{$brand->name}}</option>
        @endforeach
    </select>


    <p class="w-full text-xl font-bold flex justify-center">Dimensions :</p>
    <div class="flex flex-col gap-2">
        <div>
            <label for="largeur" class="font-bold block mx-auto w-fit">Largeur (cm) * :</label>
            <select name="largeur" id="largeur" class="rounded-lg w-full">
                <option value="" class="text-gray-600">Choisir une largeur</option>
                @foreach ($largeurs as $largeur)
                    <option value="{{$largeur->id}}" @selected($largeur->id == old('largeur'))>{{$largeur->value}}</option>
                @endforeach
            </select>
        </div>
   
        <div>
            <label for="longueur" class="font-bold block mx-auto w-fit">Longueur (cm) * :</label>
            <select name="longueur" id="longueur" class="rounded-lg w-full"> 
                <option value="" class="text-gray-600">Choisir une longueur</option>
                @foreach ($longueurs as $longueur)
                    <option value="{{$longueur->id}}" @selected($longueur->id == old('longueur'))>{{$longueur->value}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <label class="w-full text-xl font-bold flex justify-center" for="prix">Prix (€) * :</label>
    <input type="number" name="prix" id="prix" value="{{old('prix')}}" min="1" max="9999" class="rounded-lg">

    <label class="w-full text-xl font-bold flex justify-center" for="remise">Remise (%) :</label>
    <input type="number" name="remise" id="remise" value="{{old('remise')}}" min="0" max="100" class="rounded-lg">

    <label class="w-full text-xl font-bold flex justify-center" for="image">Image (URL) * :</label>
    <input type="text" name="image" id="image" value="{{old('image', '/images/mattress_1.jpg')}}" class="rounded-lg">

<button class="col-span-2 block mx-auto bg-green-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-green-500 hover:text-white">Ajouter</button>
</form>

@endsection