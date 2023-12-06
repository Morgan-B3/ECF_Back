@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">
    Ajouter un matelas
</h1>

{{-- @foreach ($errors->all() as $error)
    <p class="text-red-500">
        {{ $error }}
    </p>
@endforeach --}}

<form action="" method="post" class="grid grid-cols-2 items-center gap-y-6 my-8 w-1/2 mx-auto">

@csrf


    <label class="w-full text-xl font-bold flex justify-center" for="nom">
        Nom du matelas * :
    </label>
    <input class="rounded-lg @error('nom') ring-2 ring-red-500 @enderror" type="text" name="nom" id="nom" value="{{old('nom')}}" minlength="3" maxlength="255">
    @error('nom')
        <div></div>
        <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror


    <label class="w-full text-xl font-bold flex justify-center" for="brand">
        Marque * :
    </label>
    <select name="brand" id="brand" class="rounded-lg @error('brand') ring-2 ring-red-500 @enderror">
        <option value="" class="text-gray-600">
            Choisir une marque
        </option>
        @foreach ($brands as $brand)
            <option value="{{$brand->id}}" @selected($brand->id == old('brand', $selectedBrand))>
                {{$brand->name}}
            </option>
        @endforeach
    </select>

    @error('brand')
        <div></div>
        <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror
  

    <p class="w-full text-xl font-bold flex justify-center">
        Dimensions :
    </p>
    <div class="flex flex-col gap-2">
        <div>
            <label for="largeur" class="font-bold block mx-auto w-fit">
                Largeur (cm) * :
            </label>
            <select name="largeur" id="largeur" class="rounded-lg w-full @error('largeur') ring-2 ring-red-500 @enderror">
                <option value="" class="text-gray-600">
                    Choisir une largeur
                </option>
                @foreach ($largeurs as $largeur)
                    <option value="{{$largeur->id}}" @selected($largeur->id == old('largeur'))>
                        {{$largeur->value}}
                    </option>
                @endforeach
            </select>
        </div>
        @error('largeur')
            <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
                {{$message}}
            </div>
        @enderror
        
        <div>
            <label for="longueur" class="font-bold block mx-auto w-fit">
                Longueur (cm) * :
            </label>
            <select name="longueur" id="longueur" class="rounded-lg w-full @error('longueur') ring-2 ring-red-500 @enderror"> 
                <option value="" class="text-gray-600">
                    Choisir une longueur
                </option>
                @foreach ($longueurs as $longueur)
                    <option value="{{$longueur->id}}" @selected($longueur->id == old('longueur'))>
                        {{$longueur->value}}
                    </option>
                @endforeach
            </select>
        </div>
        @error('longueur')
            <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
                {{$message}}
            </div>
        @enderror
    </div>
 


    <label class="w-full text-xl font-bold flex justify-center" for="prix">
        Prix (€) * :
    </label>
    <input type="number" name="prix" id="prix" value="{{old('prix')}}" min="1" max="9999" class="rounded-lg @error('prix') ring-2 ring-red-500 @enderror">
    @error('prix')
        <div></div>
        <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror

    <label class="w-full text-xl font-bold flex justify-center" for="remise">
        Remise (%) :
    </label>
    <input type="number" name="remise" id="remise" value="{{old('remise')}}" min="1" max="100" class="rounded-lg @error('remise') ring-2 ring-red-500 @enderror">
    @error('remise')
        <div></div>
        <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror
    

    <label class="w-full text-xl font-bold flex justify-center" for="image">
        Image (URL) * :
    </label>
    <input type="text" name="image" id="image" value="{{old('image', '/images/mattress_1.jpg')}}" class="rounded-lg @error('image') ring-2 ring-red-500 @enderror">
    @error('image')
        <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror
  

    <button class="col-span-2 block mx-auto bg-green-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-green-300 hover:text-green-800 active:bg-green-500 active:text-black duration-150 transition-all ">
        Ajouter
    </button>
</form>

@endsection