<?php

use App\Http\Controllers\MatelasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Page d'accueil (catalogue)
Route::get('/', [MatelasController::class, 'index']);
//Ajouter un matelas
Route::get('/ajouter', [MatelasController::class, 'create']);
Route::post('/ajouter', [MatelasController::class, 'create']);
