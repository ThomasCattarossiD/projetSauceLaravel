<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\sauceController::class, 'index'])->name('home');

Route::get('/sauce/{sauces}', [App\Http\Controllers\sauceController::class, 'show'])->name('sauce.show');

Route::get('/addSauceForm', [App\Http\Controllers\sauceController::class, 'addSauceForm'])->name('addSauceForm');

Route::post('/ajouter-Sauce', [App\Http\Controllers\sauceController::class, 'ajouterSauce'])->name('ajouterSauce');

Route::get('/sauce/{sauces}/addLikes', [App\Http\Controllers\sauceController::class, 'addLike'])->name('sauce.addLike');

Route::get('/sauce/{sauces}/addDislike', [App\Http\Controllers\sauceController::class, 'addDislike'])->name('sauce.addDislike');

Route::get('/sauce/{sauces}/modifierForm', [App\Http\Controllers\sauceController::class, 'modifierForm'])->name('sauce.modifierForm');

Route::post('/sauce/{sauces}/update-Sauce', [App\Http\Controllers\sauceController::class, 'updateSauce'])->name('sauce.updateSauce');

Route::get('/sauce/{sauces}/supprimer', [App\Http\Controllers\sauceController::class, 'supprimer'])->name('sauce.supprimer');


