<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
	Route::get('connexion', [AuthenticatedSessionController::class, 'create'])
		->name('login');

	Route::post('connexion', [AuthenticatedSessionController::class, 'store']);

	Route::get('motpasse-oublie', [PasswordResetLinkController::class, 'create'])
		->name('password.request');

	Route::post('motpasse-oublie', [PasswordResetLinkController::class, 'store'])
		->name('password.email');

	Route::get('motpass-reset/{token}', [NewPasswordController::class, 'create'])
		->name('motpass-reset');

	Route::post('motpass-reset', [NewPasswordController::class, 'store'])
		->name('password.store');

	//Route::get('inscription', [RegisteredUserController::class, 'create'])->name('register');
	//Route::post('inscription', [RegisteredUserController::class, 'store'])->name('compte-creation');
});

Route::middleware('auth')->group(function () {

	Route::get('inscription', [RegisteredUserController::class, 'create'])->name('register');
	Route::post('inscription', [RegisteredUserController::class, 'store'])->name('compte-creation');

	Route::get('/profil', [ProfileController::class, 'view'])->name('profile.view');
	Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::get('/profil/password', [ProfileController::class, 'password'])->name('profile.password');
	Route::patch('/profil/update', [ProfileController::class, 'update'])->name('profile.update');

	Route::get('/admin', [AdminController::class, 'show'])->name('admin.users');
	Route::get('/admin/view', [AdminController::class, 'view'])->name('admin.view');
	Route::post('/admin/view/edit', [AdminController::class, 'edit'])->name('admin.edit');
	Route::get('/admin/view/edit', [AdminController::class, 'edit']);
	Route::get('/admin/view/password', [AdminController::class, 'password'])->name('admin.password');
	Route::patch('/admin/view/edit/update', [AdminController::class, 'update'])->name('admin.update');
	Route::patch('/admin/view/password', [AdminController::class, 'update_password'])->name('admin.update_password');
	Route::delete('/admin/view/delete', [AdminController::class, 'destroy'])->name('admin.destroy');

	Route::get('change-password', [NewPasswordController::class, 'create'])
		->name('password.change');

	Route::patch('change-password', [NewPasswordController::class, 'store'])
		->name('password.update');

	Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
		->name('logout');

});
