<?php

use App\Http\Controllers\LoginUsuariosController; // Asegúrate de que el nombre del controlador sea correcto
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adm_Usuarios_controller;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UsuarioController;

Route::get('/adm_index', [Adm_Usuarios_controller::class, 'index'])->name('adm.index');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginUsuariosController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginUsuariosController::class, 'login']); // Cambia LoginUsuariosController a LoginUsuariosController
Route::post('/register', [LoginUsuariosController::class, 'register'])->name('register');
Route::post('/logout', [LoginUsuariosController::class, 'logout'])->name('logout');

Route::post('/admin/usuarios/create', [UsuarioController::class, 'create']);
Route::post('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.store');

Route::prefix('admin')->group(function () {
    Route::get('/usuarios', [Adm_Usuarios_controller::class, 'index'])->name('adm.index');
    Route::post('/usuarios/create', [Adm_Usuarios_controller::class, 'create'])->name('adm.create');
    Route::get('/usuarios/get_user/{id}', [Adm_Usuarios_controller::class, 'get_user'])->name('adm.get_user');
    Route::post('/usuarios/update', [Adm_Usuarios_controller::class, 'update'])->name('adm.update');
    Route::post('/usuarios/delete', [Adm_Usuarios_controller::class, 'delete'])->name('adm.delete');
    Route::get('/usuarios/search', [Adm_Usuarios_controller::class, 'search_user'])->name('adm.search_user');
});
