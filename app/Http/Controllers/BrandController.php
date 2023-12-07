<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Matelas;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Affiche la liste des marques
     */
    public function index(){
        return view('brand/index',[
            'title' => 'Marques',
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Affiche les matelas d'une marque donnée
     */
    public function show($brand_name){
        $brand = Brand::where('name', $brand_name)->first();
        $matelas = Matelas::all()->where('brand_id',$brand->id);
        // $matelas = Matelas::join('matelas_brands','matelas.id','matelas_brands.matelas_id')
        // ->join('brands', 'brands.id', 'matelas_brands.brand_id')
        // ->select('matelas.*')
        // ->where('brands.name', $brand_name)
        // ->get();
    
        foreach($matelas as $matela){
            $matela->discounted_price = Matelas::discount($matela->price, $matela->discount);
        }

        return view('brand/show', [
            'title' => "Liste $brand_name",
            'matelas' => $matelas,
            'brand' => $brand_name,
        ]);
    }

    /**
     * Tri des matelas
     */
    public function filter($brand_name, $filtre){
        $brand = Brand::where('name', $brand_name)->first();
        $matelas = Matelas::all()->where('brand_id',$brand->id)->sortBy($filtre);
        // $matelas = Matelas::join('matelas_brands','matelas.id','matelas_brands.matelas_id')
        // ->join('brands', 'brands.id', 'matelas_brands.brand_id')
        // ->select('matelas.*')
        // ->where('brands.name', $brand)
        // ->get()
        // ->sortBy("$filtre");

        foreach($matelas as $matela){
            $matela->discounted_price = Matelas::discount($matela->price, $matela->discount);
        }

        return view('brand/show', [
            'matelas' => $matelas,
            "title" => 'Literie3000',
            'brand' => $brand_name,
        ]);
    }
}
