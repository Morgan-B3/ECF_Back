@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">CATALOGUE</h1>
@if (session('message'))
<p class="rounded shadow text-green-800 bg-green-300 text-center p-2 mb-9">
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
                <option value="dimension">Dimensions</option>
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

<form action="" class="grid grid-cols-6 gap-2 bg-white mb-2 ">
    <a href="">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500">
        ID
        </div>
    </a>
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Image</p>
    </div>
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Marque</p>
    </div>
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Nom / Dimensions</p>
    </div>
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Prix</p>
    </div>
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Actions</p>
    </div>
</form>

<div class="grid grid-cols-6 gap-2 bg-white mb-8">
    @php
        $number = 0
    @endphp

    @foreach ($matelas as $matela)

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <p>{{$matela->id}}</p>
        </div>

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <img src="{{$matela->image}}" alt="matelas{{$matela->id}}">
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <h2>{{$matela->brand}}</h2>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            <p>{{$matela->name}}</p>
            <p>{{$matela->dimension}}</p>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-300  @endif flex flex-col items-center justify-center gap-4">
            @if ($matela->discounted_price)
            <p class="line-through">{{$matela->price}} €</p>
            <p>{{$matela->discounted_price}} € (-{{$matela->discount}}%)</p>                
            @else
            <p class="">{{$matela->price}} €</p>  
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