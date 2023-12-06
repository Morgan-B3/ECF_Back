<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\MatelasController;
use Illuminate\Support\Facades\Route;


// Page d'accueil (catalogue)
Route::get('/', [MatelasController::class, 'index']);
Route::get('/tri/{filtre}', [MatelasController::class, 'filter']);

//Marques
Route::get('/marques', [BrandController::class, 'index']);
Route::get('/marques/{marque}/tri/{filtre}', [BrandController::class, 'filter']);
Route::get('/marques/{marque}', [BrandController::class, 'show']);

//Ajouter un matelas
Route::get('/ajouter/{brand?}', [MatelasController::class, 'create']);
Route::post('/ajouter', [MatelasController::class, 'store']);

//Modifier un matelas
Route::get('/{id}/modifier', [MatelasController::class, 'edit']);
Route::post('/{id}/modifier', [MatelasController::class, 'update']);

//Supprimer un matelas
Route::get('/{id}/supprimer', [MatelasController::class, 'destroy']);
