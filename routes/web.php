<?php

use App\Http\Controllers\angajatdashController;
use App\Http\Controllers\CarteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\listaController;
use App\Http\Controllers\SearchController;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;


Route::get('/', [IndexController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('isAngajat')->group(function () {
    Route::get('/angajatdash', [angajatdashController::class, 'view'])->name('angajatdash.view');
    Route::post('/angajatdash', [angajatdashController::class, 'update'])->name('angajatdash.update');
});

Route::controller(contactController::class)->group(function () {
    Route::get('/contact',  'view')->name('contact.view');
    Route::post('/contact/send', 'store')->name('contact.store');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/favorite', [listaController::class, 'store'])->name('favorite.add');
    Route::post('/cart', [listaController::class, 'store'])->name('cart.add');
});

Route::get('/search', [SearchController::class, 'search']);

Route::get('/carte/{isbn}', [CarteController::class, 'view']);

Route::get('categorie/{categorie}', [CategorieController::class, 'view']);

Route::middleware(['auth', 'verified', 'isAngajat'])
    ->group(function () {
        Route::get('/categorie', [CategorieController::class, 'index']);
        Route::get('/categorie/{categorie}/edit', [CategorieController::class, 'edit']);
    });

require __DIR__ . '/auth.php';
