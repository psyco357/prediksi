<?php

use App\Http\Controllers\Admin\MenuControl;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\MemberControl;
use App\Http\Controllers\PersembahanControl;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('contents.home');
});
Route::get('/landing', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('contents.about');
});
Route::get('/kegiatan', function () {
    return view('contents.kegiatan');
});
Route::get('/persembahan', function () {
    return view('contents.persembahan');
});

//auth
Route::get('/login', function () {
    return view('contents.login');
});
//admin
// Route::get('/admin/admin', function () {
//     return view('admin.contents.member');
// });
//landingPage
Route::get('/persembahan', [PersembahanControl::class, 'Persembahan']);
Route::get('admin/persembahan', [PersembahanControl::class, 'Persembahans']);
Route::post('/persembahan/add', [PersembahanControl::class, 'store'])->name('persembahan.store');
// Route::put('/admin/persembahan/{id}', [PersembahanControl::class, 'update'])->name('persembahan.update');
Route::patch('/admin/persembahan/{id}', [PersembahanControl::class, 'updateStatus'])->name('persembahan.status');


//member
Route::get('/admin/member', [MemberControl::class, 'members']);
// Route untuk update member (modal edit)
Route::put('/admin/member/{id}', [MemberControl::class, 'update'])->name('member.update');

// Route untuk hapus member (modal delete)
Route::delete('/admin/member/{id}', [MemberControl::class, 'destroy'])->name('member.destroy');
Route::post('/member/add', [MemberControl::class, 'store'])->name('member.store');
Route::get('/member/ambildata/{id}', [MemberControl::class, 'ambilData'])->name('member.ambilmember');
// Route::get('/', [UserController::class, 'formLogin'])->name('login');
// Route::post('/auth', [UserController::class, 'auth']);

// Route::get('/dashboard', [MenuControl::class, 'Menu']);

// Route::get('/users/menu', [MenuControl::class, 'menuSetting']);
// Route::post('/savemenu', [MenuControl::class, 'saveMenu']);
// Route::get('/menudata', [MenuControl::class, 'semuaMenu'])->name('menu.data');
// Route::post('/menu/{id}', [MenuControl::class, 'update'])->name('menu.update');
// Route::delete('/menu/{id}', [MenuControl::class, 'destroy'])->name('menu.destroy');
// Route::get('/selectMenu/menu-options', [MenuControl::class, 'selectMenu'])->name('menu.options');
