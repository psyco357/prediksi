<?php

use App\Http\Controllers\Admin\MenuControl;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage.index');
});
Route::get('/landing', function () {
    return view('index');
});

// Route::get('/', [UserController::class, 'formLogin'])->name('login');
// Route::post('/auth', [UserController::class, 'auth']);

// Route::get('/dashboard', [MenuControl::class, 'Menu']);

// Route::get('/users/menu', [MenuControl::class, 'menuSetting']);
// Route::post('/savemenu', [MenuControl::class, 'saveMenu']);
// Route::get('/menudata', [MenuControl::class, 'semuaMenu'])->name('menu.data');
// Route::post('/menu/{id}', [MenuControl::class, 'update'])->name('menu.update');
// Route::delete('/menu/{id}', [MenuControl::class, 'destroy'])->name('menu.destroy');
// Route::get('/selectMenu/menu-options', [MenuControl::class, 'selectMenu'])->name('menu.options');
