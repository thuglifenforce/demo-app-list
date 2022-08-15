<?php

use App\Http\Controllers\ImportController;
use App\Http\Livewire\ImportClient;
use App\Http\Livewire\ListClient;
use App\Models\Import;
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
})->name('liste');

Route::get('list', function () {
    return view('pages.list');
})->name('import');

Route::post('list', [ImportClient::class, 'import'], function () {
    return view('pages.list' );
});


Route::delete('list', [ListClient::class, 'destroy'], function () {
    return view('pages.list');
})->name('delete');





// Route::post('/', [ListClient::class, 'update'], function () {
//     return view('welcome' );
// });


// Route::get('list',[ImportClient::class, 'render'])->name('import');
// Route::post('pages.list',[ImportClient::class, 'import']);
// Route::get('list',[ListClient::class, 'render'])->name('list');
// Route::post('list',[ImportController::class, 'update'])->name('list');



Route::get('/dashboard', function () {



    return view('dashboard');

})->middleware(['auth'])->name('dashboard');



// Route::get('/dashboard', function () {

//     return view('dashboard');

// })->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
