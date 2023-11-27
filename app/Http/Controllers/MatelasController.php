<?php

namespace App\Http\Controllers;

use App\Models\Matelas;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class MatelasController extends Controller
{
    /**
     * Affiche l'accueil
     */
    public function index()
    {
        $matelas = Matelas::all();
        return view('home', [
            'matelas' => $matelas,
            "title" => 'Literie3000'
        ]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function create()
    {
        
        return view('create',[
            'title' => 'Ajouter un matelas',
            'brands' => ['EPEDA', 'DREAMWAY', 'BULTEX', 'DORSOLINE', 'MEMORYLINE'],
            'dimensions' => ['90x190', '140x190', '160x200', '180x200', '200x200'],
        ]);
    }

    /**
     * Valide le formulaire d'ajout
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required|in:'.implode(',', ['EPEDA', 'DREAMWAY', 'BULTEX', 'DORSOLINE', 'MEMORYLINE']),
            'dimension' => 'required|in:'.implode(',',['90x190', '140x190', '160x200', '180x200', '200x200']),
            'price' => 'required|numeric|between:1,9999',
            'discount' => 'nullable|numeric|between:0,100',
            'image' => 'url',
        ]);
        return view('create',[
            'title' => 'Ajouter un matelas',
            'brands' => ['EPEDA', 'DREAMWAY', 'BULTEX', 'DORSOLINE', 'MEMORYLINE'],
            'dimensions' => ['90x190', '140x190', '160x200', '180x200', '200x200'],
        ]);
    }
}
