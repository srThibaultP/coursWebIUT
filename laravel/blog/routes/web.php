<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    $a = 1 + 4;

    //return $a;
});

Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/bonjour', function () {
//     return 'bonjour ' . request('prenom');
// });

// Route::get('/bonjour/{prenom}', function () {
//     return 'bonjour ' . request('prenom');
// });

// Route::get('/bonjour/{nom}', function () {
//     $nom = request('nom');
//     return view('bonjour');
// });

Route::get('/bonjour/{nom_du_parametre_get}', function () {
    $nom_dans_la_fonction_anonyme = request('nom_du_parametre_get');

    return view('bonjour', [
        'nom_dans_la_vue' => $nom_dans_la_fonction_anonyme,
    ]);
});
