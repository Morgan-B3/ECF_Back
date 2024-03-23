
@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">
    Modifier le matelas {{$matelas->name}}
</h1>


<form action="" method="post" class="grid grid-cols-2 items-center gap-y-6 my-8 w-1/2 mx-auto" enctype="multipart/form-data">

@csrf

    <label class="w-full text-xl font-bold flex justify-center" for="nom">
        Nom du matelas * :
    </label>
    <input class="rounded-lg" type="text" name="nom" id="nom" value="{{old('nom', $matelas->name)}}">
    @error('nom')
        <div class="col-span-2 w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror


    <label class="w-full text-xl font-bold flex justify-center" for="marque">
        Marque * :
    </label>
    <select name="marque" id="marque" class="rounded-lg">
        <option value="" class="text-gray-600">
            Choisir une marque
        </option>
        @foreach ($brands as $brand)
            <option value="{{$brand->id}}" @selected($brand->id == old('marque', $matelas->brand_id))>
                {{$brand->name}}
            </option>
        @endforeach
    </select>
    @error('marque')
        <div class="col-span-2 w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror


    <p class="w-full text-xl font-bold flex justify-center">
        Dimensions :
    </p>
    <div class="flex flex-col gap-2">
        <div>
        <label class="font-bold block mx-auto w-fit" for="largeur">
            Largeur (cm) * :
        </label>
        <select name="largeur" id="largeur" class="rounded-lg w-full">
            <option value="" class="text-gray-600">
                Choisir une largeur
            </option>
            @foreach ($largeurs as $largeur)
                <option value="{{$largeur->id}}" @selected($largeur->id == old('largeur', $matelas->largeur_id))>
                    {{$largeur->value}}
                </option>
            @endforeach
        </select>
        </div>
        @error('largeur')
            <div class="col-span-2 w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
                {{$message}}
            </div>
        @enderror


        <div>
        <label class="font-bold block mx-auto w-fit" for="longueur">
            Longueur (cm) * :
        </label>
        <select name="longueur" id="longueur" class="rounded-lg w-full">
            <option value="" class="text-gray-600">
                Choisir une longueur
            </option>
            @foreach ($longueurs as $longueur)
                <option value="{{$longueur->id}}" @selected($longueur->id == old('longueur', $matelas->longueur_id))>
                    {{$longueur->value}}
                </option>
            @endforeach
        </select>
        </div>
        @error('longueur')
            <div class="col-span-2 w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
                {{$message}}
            </div>
        @enderror
    </div>


    <label class="w-full text-xl font-bold flex justify-center" for="prix">
        Prix (€) * :
    </label>
    <input type="number" name="prix" id="prix" value="{{old('prix', $matelas->price)}}" min="1" max="9999" class="rounded-lg">
    @error('prix')
        <div class="col-span-2 w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror


    <label class="w-full text-xl font-bold flex justify-center" for="remise">
        Remise (%) :
    </label>
    <input type="number" name="remise" id="remise" value="{{old('remise', $matelas->discount)}}" min="0" max="100" class="rounded-lg">
    @error('remise')
        <div class="col-span-2 w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror


    <label class="w-full text-xl font-bold flex justify-center" for="image">
        Image (URL) * :
    </label>
    <div>
        <p><strong>Ancienne image : </strong>{{$matelas->image}}</p>
        <input type="file" class="form-control @error('image') ring-2 ring-red-500 @enderror" name="image" id="image"> 
    </div>
    @error('image')
        <div></div>
        <div class="w-fit mx-auto bg-red-300 px-4 py-2 rounded-lg text-red-800">
            {{$message}}
        </div>
    @enderror

<button class="col-span-2 block mx-auto bg-orange-400 rounded-lg px-4 py-2 w-fit my-4 hover:bg-orange-300 hover:text-orange-800 active:bg-orange-500 active:text-black duration-150 transition-all ">
    Modifier
</button>
</form>

@endsection