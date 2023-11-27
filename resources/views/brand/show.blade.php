@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">Liste {{$brand}}</h1>
@if (session('message'))
<p class="rounded w-fit mx-auto shadow text-green-800 bg-green-300 text-center p-2 my-6">
    {{ session('message') }}
</p>
@endif
<a href="/ajouter" class="block mx-auto bg-green-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-green-500 hover:text-white ">Ajouter un matelas</a>



<div class="grid grid-cols-7 gap-2 bg-white mb-8">
    @php
        $number = 0
    @endphp

    <a href="/marques/{{$brand}}/tri/id">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>ID </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>

    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Image</p>
    </div>
    
    <a href="/marques/{{$brand}}/tri/brand">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Marque </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>
    
    <a href="/marques/{{$brand}}/tri/name">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Nom </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>

    <a href="/marques/{{$brand}}/tri/largeur">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Dimensions (cm) </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>

    <a href="/marques/{{$brand}}/tri/price">
        <div class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2">
            <p>Prix </p><i class="fa-solid fa-angle-down"></i>
        </div>
    </a>
    
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>Actions</p>
    </div>
    
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

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex items-center justify-center text-2xl gap-4">
            <a href="/{{$matela->id}}/modifier" title="Modifier" class="block text-orange-600 hover:text-white w-fit hover:bg-orange-400 rounded-lg px-3 py-2"><i class="fa-regular fa-pen-to-square "></i></a>
            <a href="/{{$matela->id}}/supprimer" title="Supprimer" class="block text-red-600 hover:text-white w-fit hover:bg-red-400 rounded-lg px-3 py-2" onclick='return confirm("Êtes-vous sûr(e) de vouloir supprimer le matelas {{$matela->name}}?")'><i class="fa-solid fa-trash-can"></i></a>
        </div>

        @php
            $number++ 
        @endphp
    @endforeach

</div>

@endsection