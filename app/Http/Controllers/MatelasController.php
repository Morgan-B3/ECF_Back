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

        foreach($matelas as $matela){
            $matela->discounted_price = Matelas::discount($matela->price, $matela->discount);
        }
    
        return view('home', [
            'matelas' => $matelas,
            "title" => 'Literie3000'
        ]);
    }


    /**
     * Tri des matelas
     */
    public function filter($filtre){
        // $order = $_GET['order_by'] ?? '';
        // $direction = $_GET['direction'] ?? '';
        // $min_price = $_GET['min_price'] ?? '';
        // $max_price = $_GET['max_price'] ?? '';
        
        // if(! empty($order) || ! empty($direction) || ! empty($min_price) || ! empty($max_price)){

        $matelas = Matelas::all()->sortBy("$filtre");

        foreach($matelas as $matela){
            $matela->discounted_price = Matelas::discount($matela->price, $matela->discount);
        }

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
            'nom' => 'required',
            'marque' => 'required|in:'.implode(',', ['EPEDA', 'DREAMWAY', 'BULTEX', 'DORSOLINE', 'MEMORYLINE']),
            'dimension' => 'required|in:'.implode(',',['90x190', '140x190', '160x200', '180x200', '200x200']),
            'prix' => 'required|numeric|between:1,9999',
            'remise' => 'nullable|numeric|between:0,100',
            'image' => 'url',
        ]);

        $matelas = new Matelas();
        $matelas->name = $request->nom;
        $matelas->brand = $request->marque;
        $matelas->dimension = $request->dimension;
        $matelas->price = $request->prix;
        $matelas->discount = $request->input('remise', null);
        $matelas->image = $request->input('image', 'https://via.placeholder.com/640x480.png/007766?text=facere');
        $matelas->save();

        return redirect('/')->with('message', 'Le matelas a été ajouté.');
    }


    /**
     * Affiche le formulaire de modification
     */
    public function edit($id)
    {
        $matelas = Matelas::findOrFail($id);
        return view('edit', [
            'title' => 'Modifier un matelas',
            'matelas' => $matelas,
            'brands' => ['EPEDA', 'DREAMWAY', 'BULTEX', 'DORSOLINE', 'MEMORYLINE'],
            'dimensions' => ['90x190', '140x190', '160x200', '180x200', '200x200'],
        ]);
    }

     /**
     * Valide le formulaire de modification
     */
    public function update(Request $request, $id)
    {
        $matelas = Matelas::findOrFail($id);
        
        $request->validate([
            'nom' => 'required',
            'marque' => 'required|in:'.implode(',', ['EPEDA', 'DREAMWAY', 'BULTEX', 'DORSOLINE', 'MEMORYLINE']),
            'dimension' => 'required|in:'.implode(',',['90x190', '140x190', '160x200', '180x200', '200x200']),
            'prix' => 'required|numeric|between:1,9999',
            'remise' => 'nullable|numeric|between:0,100',
            'image' => 'url',
        ]);

        $matelas->name = $request->nom;
        $matelas->brand = $request->marque;
        $matelas->dimension = $request->dimension;
        $matelas->price = $request->prix;
        $matelas->discount = $request->input('remise', null);
        $matelas->image = $request->input('image', 'https://via.placeholder.com/640x480.png/007766?text=facere');
        $matelas->save();

        return redirect('/')->with('message', "Le matelas $matelas->id a été modifié.");
    }

    public function destroy($id)
    {
        Matelas::destroy($id);

        return redirect('/')->with('message', "Le matelas $id a été supprimé.");
    }
}
