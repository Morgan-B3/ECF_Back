@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">CATALOGUE</h1>
<a href="/ajouter">Ajouter un matelas</a>

<div class="grid grid-cols-5 gap-2 bg-white">
    @foreach ($matelas as $matela)
        <div class="bg-gray-200">
            <img src="{{$matela->image}}" alt="matelas{{$matela->id}}">
        </div>
        <div class="bg-gray-200">
            <h2>{{$matela->brand}}</h2>
        </div>
        <div class="bg-gray-200">
            <p>{{$matela->name}}</p>
            <p>{{$matela->dimension}}</p>
        </div>
        <div class="bg-gray-200">
            <p>{{$matela->price}}</p>
        </div>
        <div class="bg-gray-200">
            <a href="" class="block">Modifier</a>
            <a href="" class="block">Supprimer</a>
        </div>
    @endforeach

</div>

@endsection