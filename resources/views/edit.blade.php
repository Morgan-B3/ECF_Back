@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">Modifier le matelas {{$matelas->name}}</h1>

@foreach ($errors->all() as $error)
    <p class="text-red-500">{{ $error }}</p>
@endforeach

<form action="" method="post" class="grid grid-cols-2 items-center gap-y-6 my-8 w-1/2 mx-auto">

@csrf


    <label class="w-full text-xl font-bold flex justify-center" for="nom">Nom du matelas * :</label>
    <input class="rounded-lg" type="text" name="nom" id="nom" value="{{old('nom', $matelas->name)}}">

    <label class="w-full text-xl font-bold flex justify-center" for="brand">Marque * :</label>
    <select name="brand" id="brand" class="rounded-lg">
        <option value="" class="text-gray-600">Choisir une marque</option>
        @foreach ($brands as $brand)
            <option value="{{$brand->id}}" @selected($brand->id == old('brand', $matelas->brand->pluck('id')->implode('')))>{{$brand->name}}</option>
        @endforeach
    </select>


    <p class="w-full text-xl font-bold flex justify-center">Dimensions :</p>
    <div class="flex flex-col gap-2">
        <div>
        <label class="font-bold block mx-auto w-fit" for="largeur">Largeur (cm) * :</label>
        <select name="largeur" id="largeur" class="rounded-lg w-full">
            <option value="" class="text-gray-600">Choisir une largeur</option>
            @foreach ($largeurs as $largeur)
                <option value="{{$largeur->id}}" @selected($largeur->id == old('largeur', $matelas->largeur->pluck('id')->implode('')))>{{$largeur->value}}</option>
            @endforeach
        </select>
        </div>

        <div>
        <label class="font-bold block mx-auto w-fit" for="longueur">Longueur (cm) * :</label>
        <select name="longueur" id="longueur" class="rounded-lg w-full">
            <option value="" class="text-gray-600">Choisir une longueur</option>
            @foreach ($longueurs as $longueur)
                <option value="{{$longueur->id}}" @selected($longueur->id == old('longueur', $matelas->longueur->pluck('id')->implode('')))>{{$longueur->value}}</option>
            @endforeach
        </select>
        </div>
    </div>


    <label class="w-full text-xl font-bold flex justify-center" for="prix">Prix (€) * :</label>
    <input type="number" name="prix" id="prix" value="{{old('prix', $matelas->price)}}" min="1" max="9999" class="rounded-lg">

    <label class="w-full text-xl font-bold flex justify-center" for="remise">Remise (%) :</label>
    <input type="number" name="remise" id="remise" value="{{old('remise', $matelas->discount)}}" min="0" max="100" class="rounded-lg">

    <label class="w-full text-xl font-bold flex justify-center" for="image">Image (URL) * :</label>
    <input type="file" name="image" id="image">


<button class="col-span-2 block mx-auto bg-green-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-green-500 hover:text-white">Modifier</button>
</form>

@endsection