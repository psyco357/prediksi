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
// Route::get('/login', function () {
//     return view('contents.login');
// });
Route::get('/login', [UserController::class, 'formLogin'])->name('login');
Route::post('/auth', [UserController::class, 'auth']);
//admin
// Route::get('/admin/admin', function () {
//     return view('admin.contents.member');
// });
//landingPage
Route::get('/persembahan', [PersembahanControl::class, 'Persembahan']);
Route::post('/persembahan/add', [PersembahanControl::class, 'store'])->name('persembahan.store');
// Route::put('/admin/persembahan/{id}', [PersembahanControl::class, 'update'])->name('persembahan.update');
Route::post('/member/add', [MemberControl::class, 'store'])->name('member.store');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::patch('/admin/persembahan/{id}', [PersembahanControl::class, 'updateStatus'])->name('persembahan.status');
    Route::get('admin/persembahan', [PersembahanControl::class, 'Persembahans']);
    //member
    Route::get('/admin/member', [MemberControl::class, 'members']);
    Route::put('/admin/member/{id}', [MemberControl::class, 'update'])->name('member.update');

    // Route untuk hapus member (modal delete)
    Route::delete('/admin/member/{id}', [MemberControl::class, 'destroy'])->name('member.destroy');
    Route::get('/member/ambildata/{id}', [MemberControl::class, 'ambilData'])->name('member.ambilmember');

    // Akun
    Route::get('/admin/profil', [UserController::class, 'profil']);
});
