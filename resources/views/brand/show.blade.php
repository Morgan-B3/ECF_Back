@php
    use App\Models\Brand;
    use App\Models\Largeur;
    use App\Models\Longueur;
@endphp

@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">
    Liste {{$brand}}
</h1>

@if (session('message'))
    <p class="rounded w-fit mx-auto shadow text-green-800 bg-green-300 text-center p-2 my-6">
        {{ session('message') }}
    </p>
@endif

<a href="/ajouter/{{$brand}}" class="block mx-auto bg-green-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-green-300 hover:text-green-800 active:bg-green-500 active:text-black duration-150 transition-all " title="Ajouter un matelas">
    Ajouter un matelas
</a>



<div class="grid grid-cols-7 gap-2 bg-white mb-8">
    @php
        $number = 0
    @endphp

    <a href="/marques/{{$brand}}/tri/id" class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2 duration-150 transition-all" title="Trier par ID">
        ID
        <i class="fa-solid fa-angle-down"></i>
    </a>

    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>
            Image
        </p>
    </div>
    
    <a href="/marques/{{$brand}}/tri/brand" class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2 duration-150 transition-all" title="Trier par Marque">
        Marque
        <i class="fa-solid fa-angle-down"></i>
    </a>
    
    <a href="/marques/{{$brand}}/tri/name" class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2 duration-150 transition-all" title="Trier par Nom">
        Nom 
        <i class="fa-solid fa-angle-down"></i>
    </a>

    <a href="/marques/{{$brand}}/tri/largeur" class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2 duration-150 transition-all" title="Trier par Largeur">
        Dimensions (cm) 
        <i class="fa-solid fa-angle-down"></i>
    </a>

    <a href="/marques/{{$brand}}/tri/price" class= "bg-gray-400 text-white text-center font-bold py-2 hover:bg-gray-500 flex justify-center items-center gap-2 duration-150 transition-all" title="Trier par Prix">
        Prix 
        <i class="fa-solid fa-angle-down"></i>
    </a>
    
    <div class= "bg-gray-400 text-white text-center font-bold py-2">
        <p>
            Actions
        </p>
    </div>
    
    @foreach ($matelas as $matela)

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <p>
                {{$matela->id}}
            </p>
        </div>

        <div class= "@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <img src="/images/{{$matela->image}}" class="min-w-full h-[150px] object-cover" alt="matelas{{$matela->id}}">
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <a href="/marques/{{Brand::find($matela->brand_id)->name}}">
                <h2>
                    {{strtoupper(Brand::find($matela->brand_id)->name)}}
                </h2>
            </a>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <p class="text-center w-full break-words">
                {{Str::limit($matela->name, 30)}}
            </p>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-4">
            <p>
                {{Largeur::find($matela->largeur_id)->value}} x {{Longueur::find($matela->longueur_id)->value}}
            </p>
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex flex-col items-center justify-center gap-1">
            @if ($matela->discount)
                <div class="flex gap-2">
                    <p class="line-through text-gray-600">
                        {{$matela->price}} €
                    </p>
                    <p>
                        (-{{$matela->discount}}%)
                    </p> 
                </div>
                <p class="font-bold text-red-600">
                    {{$matela->discounted_price}} €
                </p>
                               
            @else
                <p class="font-bold">
                    {{$matela->discounted_price}} €
                </p>  
            @endif    
        </div>

        <div class="@if($number%2==0) bg-sky-200 @else bg-gray-200  @endif flex items-center justify-center text-2xl gap-4">
            <a href="/{{$matela->id}}/modifier" title="Modifier" class="block text-orange-600 hover:text-white w-fit hover:bg-orange-400 rounded-lg px-3 py-2 duration-200 transition-all active:bg-orange-600 active:text-orange-200">
                <i class="fa-regular fa-pen-to-square "></i>
            </a>
            <a href="/{{$matela->id}}/supprimer" title="Supprimer" class="block text-red-600 hover:text-white w-fit hover:bg-red-400 rounded-lg px-3 py-2 duration-200 transition-all active:bg-red-600 active:text-red-200" onclick='return confirm("Êtes-vous sûr(e) de vouloir supprimer le matelas {{$matela->name}}?")'>
                <i class="fa-solid fa-trash-can"></i>
            </a>
        </div>

        @php
            $number++ 
        @endphp
    @endforeach

</div>

@endsection