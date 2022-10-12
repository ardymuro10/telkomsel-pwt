<?php

use App\Http\Controllers\ContohController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/', App\Http\Livewire\Home\Index::class)->name('home');
    Route::get('/monitoring', App\Http\Livewire\Data\Monitoring\Index::class)->name('monitoring');
    Route::get('/import', App\Http\Livewire\Data\Import::class)->name('import');
    Route::name('data.')->prefix('/data')->group(function () {
        Route::get('/data1', App\Http\Livewire\Data\Data1\Index::class)->name('data1');
        Route::get('/data2', App\Http\Livewire\Data\Data2\Index::class)->name('data2');
        Route::get('/eqp', App\Http\Livewire\Data\Data3\Index::class)->name('eqp');
        Route::get('/tower', App\Http\Livewire\Data\Data4\Index::class)->name('tower');
        Route::get('/review', App\Http\Livewire\Data\Data5\Index::class)->name('review');
        Route::get('/demografi', App\Http\Livewire\Data\Data6\Index::class)->name('demografi');
        Route::get('/sales', App\Http\Livewire\Data\Data7\Index::class)->name('sales');
        Route::get('/powertrans', App\Http\Livewire\Data\Data8\Index::class)->name('powertrans');
        Route::get('/drm', App\Http\Livewire\Data\Data9\Index::class)->name('drm');
        Route::get('/komreport', App\Http\Livewire\Data\Data10\Index::class)->name('komreport');
    });
    Route::get('/contoh', [ContohController::class, 'contoh'])->name('contoh');
});

