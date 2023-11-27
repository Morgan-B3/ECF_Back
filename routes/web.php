<?php

use App\Http\Controllers\MatelasController;
use Illuminate\Support\Facades\Route;


// Page d'accueil (catalogue)
Route::get('/', [MatelasController::class, 'index']);

//Ajouter un matelas
Route::get('/ajouter', [MatelasController::class, 'create']);
Route::post('/ajouter', [MatelasController::class, 'store']);

//Modifier un matelas
Route::get('/{id}/modifier', [MatelasController::class, 'edit']);
Route::post('/{id}/modifier', [MatelasController::class, 'update']);

//Supprimer un matelas
Route::get('/{id}/supprimer', [MatelasController::class, 'destroy']);
