@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">CATALOGUE</h1>
@if (session('message'))
<p class="rounded w-fit mx-auto shadow text-green-800 bg-green-300 text-center p-2 my-6">
    {{ session('message') }}
</p>
@endif
<a href="/ajouter" class="block mx-auto bg-green-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-green-500 hover:text-white ">Ajouter un matelas</a>

<form action="">
    <div class="flex justify-between items-center mb-8">
        <div>
            <label for="order_by">Trier par</label>
            <select class="rounded-lg border-gray-300" name="order_by" id="order_by">
                <option value="id">ID</option>
                <option value="brand">Marque</option>
                <option value="name">Nom</option>
                <option value="largeur">Largeur</option>
                <option value="longueur">Longueur</option>
                <option value="price">Prix</option>
                <option value="discount">Remise</option>
            </select>
        </div>

        <div>
            <label for="direction">Direction</label>
            <select class="rounded-lg border-gray-300" name="direction" id="direction">
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>
        </div>

        <div>
            <label for="min_price">Prix min</label>
            <input type="text" class="rounded-lg border-gray-300" name="min_price" id="min_price">
        </div>

        <div>
            <label for="max_price">Prix max</label>
            <input type="text" class="rounded-lg border-gray-300" name="max_price" id="max_price">
        </div>

        <button class="bg-gray-900 px-4 py-2 text-white inline-block rounded hover:bg-gray-700 duration-200">Filtrer</button>
    </div>
</form>

<div class="grid grid-cols-7 gap-2 bg-white mb-8">
    @php
        $number = 0
    @endphp

    <a href="/tri/id">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500">
            <p>ID</p>
        </div>
    </a>

    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Image</p>
    </div>
    
    <a href="/tri/brand">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500">
            <p>Marque</p>
        </div>
    </a>
    
    <a href="/tri/name">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500">
            <p>Nom</p>
        </div>
    </a>

    <a href="/tri/dimension">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500">
            <p>Dimensions</p>
        </div>
    </a>

    <a href="/tri/price">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500">
            <p>Prix</p>
        </div>
    </a>
    
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Actions</p>
    </div>
    
    @foreach ($matelas as $matela)

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <p>{{$matela->id}}</p>
        </div>

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <img src="{{$matela->image}}" alt="matelas{{$matela->id}}">
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <h2>{{strtoupper($matela->brand->pluck('name')->implode(''))}}</h2>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <p>{{$matela->name}}</p>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <p>{{$matela->largeur->pluck('value')->implode('')}}x{{$matela->longueur->pluck('value')->implode('')}}</p>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            @if ($matela->discount)
            <p class="line-through">{{$matela->price}} €</p>
            <p>{{$matela->discounted_price}} € (-{{$matela->discount}}%)</p>                
            @else
            <p class="">{{$matela->discounted_price}} €</p>  
            @endif    
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <a href="/{{$matela->id}}/modifier" class="block">Modifier</a>
            <a href="/{{$matela->id}}/supprimer" class="block">Supprimer</a>
        </div>

        @php
            $number++ 
        @endphp
    @endforeach

</div>

@endsection