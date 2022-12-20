<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\ReceptionnisteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// login
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

//dashboard route
// Route::get('/', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');






//admin
Route::middleware('auth' , 'role:admin')->group(function () {
    Route::get('/admin', function () {return Inertia::render('Admin/Dashboard');})->name('admin');
    //gestion des medecins
    Route::resource('/admin/medecins', MedecinController::class);
    Route::get('/admin/medecins/search/{keyword}', [MedecinController::class, 'search'])->name('medecins.search');
    Route::get('/admin/medecins/orgnise/{type}', [MedecinController::class, 'orgnise'])->name('medecins.orgnise');
    //gestion des Receptionnistes
    Route::resource('/admin/receptionnistes', ReceptionnisteController::class);
    Route::get('/admin/receptionnistes/search/{keyword}', [ReceptionnisteController::class, 'search'])->name('receptionnistes.search');
    Route::get('/admin/receptionnistes/orgnise/{type}', [ReceptionnisteController::class, 'orgnise'])->name('receptionnistes.orgnise');
});


















//docteur
Route::middleware('auth' , 'role:medecin')->group(function () {
    Route::get('/medecin', function () {return Inertia::render('Medecin/Dashboard');})->name('medecin');
});

//receptionniste
Route::middleware('auth' , 'role:receptionniste')->group(function () {
    Route::get('/receptionniste', function () {return Inertia::render('Receptionniste/Dashboard');})->name('receptionniste');
});

Route::middleware('auth' , 'role:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
