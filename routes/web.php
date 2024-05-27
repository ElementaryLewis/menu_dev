<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\HomeController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/credits', [MenuController::class, 'credits'])->name('credits');
Route::get('/contacts', [MenuController::class, 'contacts'])->name('contacts');

Route::get(RouteServiceProvider::HOME, [HomeController::class, 'home'])->middleware('auth')->name('index');
Route::get('/cree_date', [MenuController::class, 'choose_create'])->middleware('auth')->name('cree_date');
Route::post('/cree_date/menu', [MenuController::class, 'fill_create'])->middleware('auth')->name('cree_menu');
Route::get('/cree_date/menu', [MenuController::class, 'fill_create'])->middleware('auth');
Route::post('/cree_date/menu/visual', [MenuController::class, 'visual_create'])->middleware('auth')->name('visual_create');
Route::get('/voir_date', [MenuController::class, 'choose_read'])->middleware('auth')->name('voir_date');
Route::post('/voir_date/menu', [MenuController::class, 'fill_read'])->middleware('auth')->name('voir_menu');
Route::get('/voir_date/menu', [MenuController::class, 'fill_read'])->middleware('auth');
Route::get('/modifier_date', [MenuController::class, 'choose_update'])->middleware('auth')->name('modifier_date');
Route::post('/modifier_date/menu', [MenuController::class, 'fill_update'])->middleware('auth')->name('modifier_menu');
Route::get('/modifier_date/menu', [MenuController::class, 'fill_update'])->middleware('auth');
Route::post('/modifier_date/menu/visual', [MenuController::class, 'visual_update'])->middleware('auth')->name('visual_update');

Route::post('/cree_date/menu/visual/creation', [CRUDController::class, 'CRUD_create'])->middleware('auth')->name('CRUD_create');
Route::post('/modifier_date/menu/visual/misajour', [CRUDController::class, 'CRUD_update'])->middleware('auth')->name('CRUD_update');
Route::post('/voir_date/menu/visual/misajour', [CRUDController::class, 'CRUD_read_update'])->middleware('auth')->name('CRUD_read_update');
Route::post('/voir_date/menu/visual', [CRUDController::class, 'CRUD_read'])->middleware('auth')->name('CRUD_read');
Route::post('/voir_date/menu/supprimmer', [CRUDController::class, 'CRUD_delete'])->middleware('auth')->name('CRUD_delete');
