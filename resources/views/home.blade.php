
@extends('layouts.app')

@section('content')

{{-- Affichage du message de session --}}
@if (session('message'))
<p class="rounded w-fit mx-auto shadow text-green-800 bg-green-300 text-center p-2 my-6">
    {{ session('message') }}
</p>
@endif


<h1 class="text-3xl underline mx-auto w-fit font-bold">CATALOGUE</h1>

<a href="/ajouter" class="block mx-auto bg-green-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-green-500 hover:text-white ">Ajouter un matelas</a>

{{-- Filtre --}}
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


{{-- Liste de matelas --}}
<div class="grid grid-cols-7 gap-2 bg-white mb-8">
    {{-- pour l'alternance de couleur du fond --}}
    @php
        $number = 0
    @endphp

    {{-- entêtes des colonnes (option de tri) --}}
    <a href="/tri/id">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>ID</p> <i class="fa-solid fa-angle-down"></i>
        </div>
    </a>

    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Image</p>
    </div>
    
    <a href="/tri/brand">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Marque </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>
    
    <a href="/tri/name">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Nom </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>

    <a href="/tri/largeur">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Dimensions (cm) </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>

    <a href="/tri/discounted_price">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Prix </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>
    
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Actions</p>
    </div>
    

    {{-- liste de matelas --}}
    @foreach ($matelas as $matela)

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <p>{{$matela->id}}</p>
        </div>

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <img src="{{$matela->image}}" class="h-[150px] object-cover" alt="matelas{{$matela->id}}">
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <a href="/marques/{{$matela->brand->pluck('name')->implode('')}}"><h2>{{strtoupper($matela->brand->pluck('name')->implode(''))}}</h2></a>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <p class="text-center">{{$matela->name}}</p>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <p>{{$matela->largeur->pluck('value')->implode('')}} x {{$matela->longueur->pluck('value')->implode('')}}</p>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-1">
            @if ($matela->discount)
                <div class="flex gap-2">
                    <p class="line-through">{{$matela->price}} €</p><p>(-{{$matela->discount}}%)</p> 
                </div>
                <p class="font-bold text-red-600">{{$matela->discounted_price}} €</p>
                               
            @else
                <p class="font-bold">{{$matela->discounted_price}} €</p>  
            @endif    
        </div>

        {{-- boutons de modifiation / suppression --}}
        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex items-center justify-center text-2xl gap-4">
            <a href="/{{$matela->id}}/modifier" title="Modifier" class="block text-orange-600 hover:text-white w-fit hover:bg-orange-400 rounded-lg px-3 py-2"><i class="fa-regular fa-pen-to-square "></i></a>
            <a href="/{{$matela->id}}/supprimer" title="Supprimer" class="block text-red-600 hover:text-white w-fit hover:bg-red-400 rounded-lg px-3 py-2" onclick='return confirm("Êtes-vous sûr(e) de vouloir supprimer le matelas {{$matela->name}}?")'><i class="fa-solid fa-trash-can"></i></a>
        </div>

        {{-- pour l'alternance de couleur du fond --}}
        @php
            $number++ 
        @endphp
    @endforeach

</div>

@endsection