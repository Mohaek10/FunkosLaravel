<?php

use App\Http\Controllers\FunkosController;
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
    return redirect()->route('funkos.index');
});


/*
Route::get('funkos/{id}/image', [FunkosController::class, 'editImagen'])->name('funkos.editImagen');
Route::patch('funkos/{id}/image', [FunkosController::class,'actualizarImagen'])->name('funkos.actualizarImagen');
*/
// Route::get('/funkos', [FunkosController::class, 'index'])->name('funkos.index');
// Route::get('/funkos/create', [FunkosController::class, 'create'])->name('funkos.create');
// Route::post('/funkos', [FunkosController::class, 'store'])->name('funkos.store');
// Route::get('/funkos/{id}', [FunkosController::class, 'show'])->name('funkos.show');
// Route::get('/funkos/{id}/edit', [FunkosController::class, 'edit'])->name('funkos.edit');
// Route::put('/funkos/{id}', [FunkosController::class, 'update'])->name('funkos.update');
// Route::delete('/funkos/{id}', [FunkosController::class, 'destroy'])->name('funkos.destroy');

//Detalle de un funko

Route::group(['prefix' => 'funkos'], function () {
    Route::get('/', [FunkosController::class, 'index'])->name('funkos.index');
    Route::get('/create', [FunkosController::class, 'create'])->name('funkos.create')->middleware('auth', 'admin');
    Route::post('/', [FunkosController::class, 'store'])->name('funkos.store')->middleware('auth', 'admin');
    Route::get('/{id}', [FunkosController::class, 'show'])->name('funkos.show');
    Route::get('/{id}/edit', [FunkosController::class, 'edit'])->name('funkos.edit')->middleware('auth', 'admin');
    Route::put('/{id}', [FunkosController::class, 'update'])->name('funkos.update')->middleware('auth', 'admin');
    Route::delete('/{id}', [FunkosController::class, 'destroy'])->name('funkos.destroy')->middleware('auth', 'admin');
    Route::get('/{id}/image', [FunkosController::class, 'editImagen'])->name('funkos.editImagen')->middleware('auth', 'admin');
    Route::patch('/{id}/image', [FunkosController::class,'actualizarImagen'])->name('funkos.actualizarImagen')->middleware('auth', 'admin');

});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
