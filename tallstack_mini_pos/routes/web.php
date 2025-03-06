<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\Categories\Index as CategoryIndex;
use App\Livewire\Pages\Categories\Create as CategoryCreate;
use App\Livewire\Pages\Categories\Edit as CategoryEdit;
use App\Livewire\Pages\Products\Index as ProductIndex;
use App\Livewire\Pages\Products\Create as ProductCreate;
use App\Livewire\Pages\Products\Edit as ProductEdit;
use App\Livewire\Pages\Pos\Index as PosIndex;
use App\Livewire\Pages\Dashboard\Index as DashboardIndex;


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

    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');

    // categories route
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
        Route::get('/', CategoryIndex::class)->name('index');
        Route::get('/create', CategoryCreate::class)->name('create');
        Route::get('/edit/{category}', CategoryEdit::class)->name('edit');

    });

    // products route
    Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
        Route::get('/', ProductIndex::class)->name('index');
        Route::get('/create', ProductCreate::class)->name('create');
        Route::get('/edit/{product}', ProductEdit::class)->name('edit');

    });

    Route::get('/pos', PosIndex::class)->name('pos');

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
