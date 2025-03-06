<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\Categories\Index as CategoryIndex;
use App\Livewire\Pages\Categories\Create as CategoryCreate;
use App\Livewire\Pages\Categories\Edit as CategoryEdit;


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

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth']], function(){
    // categories route
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
        Route::get('/', CategoryIndex::class)->name('index');
        Route::get('/create', CategoryCreate::class)->name('create');
        Route::get('/edit/{category}', CategoryEdit::class)->name('edit');

    });
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
