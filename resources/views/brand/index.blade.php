@extends('layouts.app')

@section('content')

<h1 class="text-3xl underline mx-auto w-fit font-bold">Nos marques</h1>
@if (session('message'))
<p class="rounded w-fit mx-auto shadow text-green-800 bg-green-300 text-center p-2 my-6">
    {{ session('message') }}
</p>
@endif


<div class="grid grid-cols-3 gap-6  my-8">
    
    @foreach ($brands as $brand)
        <a href="/marques/{{$brand->name}}" class="bg-white flex justify-center rounded-full hover:bg-[rgb(20,66,132)] hover:text-[rgb(255,204,77)]">
            <div class="mx-auto py-6 text-3xl font-bold ">{{$brand->name}}</div>
        </a>
    @endforeach

</div>

@endsection