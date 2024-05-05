<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BierController;

Route::get('/', function () {
    return view('welcome');
});

// Routes voor de bierweergaven
Route::get('/boom', [BierController::class, 'boom'])->name('bier.boom');

// Andere bieren van hetzelfde biermerk
Route::get('/andere-bieren/{id}', [BierController::class, 'andereBieren'])->name('bier.andereBieren');

// Alle bieren uit een bepaalde categorie
Route::get('/categorie/{categorieId}', [BierController::class, 'bierenPerCategorie'])->name('bier.perCategorie');

// Merken met submerken en het aantal submerken
Route::get('/submerken', [BierController::class, 'merkenMetSubmerken'])->name('bier.merkenMetSubmerken');
