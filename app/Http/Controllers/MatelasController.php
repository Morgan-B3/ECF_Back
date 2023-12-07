<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Largeur;
use App\Models\Longueur;
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
    public function create($brandName = null)
    {
        $selectedBrand = null;
        if($brandName){
            $selectedBrand = Brand::where('name',$brandName)->get()[0]->id;
        }
        return view('create',[
            'title' => 'Ajouter un matelas',
            'brands' => Brand::all()->sortBy('name'),
            'longueurs' => Longueur::all()->sortBy('value'),
            'largeurs' => Largeur::all()->sortBy('value'),
            'selectedBrand' => $selectedBrand,
        ]);
    }

    /**
     * Valide le formulaire d'ajout
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|between:3,255',
            'marque' => 'required|exists:brands,id',
            'longueur' => 'required|exists:longueurs,id',
            'largeur' => 'required|exists:largeurs,id',
            'prix' => 'required|numeric|between:1,9999',
            'remise' => 'nullable|numeric|between:1,100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $matelas = new Matelas();
        $matelas->name = $request->nom;
        $matelas->price = $request->prix;
        $matelas->discount = $request->input('remise', null);
        $matelas->discounted_price = Matelas::discount($matelas->price, $matelas->discount);
        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $matelas->image = $imageName;
        }
        $matelas->brand_id = $request->marque;
        $matelas->longueur_id = $request->longueur;
        $matelas->largeur_id = $request->largeur;
        $matelas->save();

        return redirect('/')->with('message', "Le matelas $matelas->id a été ajouté.");
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
            'brands' => Brand::all()->sortBy('name'),
            'longueurs' => Longueur::all()->sortBy('value'),
            'largeurs' => Largeur::all()->sortBy('value'),
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
            'marque' => 'required|exists:brands,id',
            'longueur' => 'required|exists:longueurs,id',
            'largeur' => 'required|exists:largeurs,id',
            'prix' => 'required|numeric|between:1,9999',
            'remise' => 'nullable|numeric|between:0,100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $matelas->name = $request->nom;
        $matelas->price = $request->prix;
        $matelas->discount = $request->input('remise', null);
        $matelas->discounted_price = Matelas::discount($matelas->price, $matelas->discount);
        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $matelas->image = $imageName;
        }
        $matelas->brand_id = $request->marque;
        $matelas->longueur_id = $request->longueur;
        $matelas->largeur_id = $request->largeur;
        $matelas->save();


        return redirect('/')->with('message', "Le matelas $matelas->id a été modifié.");
    }

    public function destroy($id)
    {
        Matelas::destroy($id);

        return redirect('/')->with('message', "Le matelas $id a été supprimé.");
    }
}
