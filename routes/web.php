<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('web.index');
});

//Proses Login
Route::get('/masuk', function () {return view('login'); });
Route::post('/auth',[App\Http\Controllers\UserController::class,'auth']);
Route::get('/keluar',[App\Http\Controllers\UserController::class,'logout'])->middleware('auth');

//tes Login
Route::get('/tes',[App\Http\Controllers\UserController::class,'tes'])->middleware('auth');


//Menu di Admin
Route::get('/admin',function(){return view('admin.index');})->middleware('admin');
Route::get('/admin/pengguna',function(){return view('admin.pengguna');})->middleware('admin');
Route::get('/admin/berita',function(){return view('admin.berita.index');})->middleware('admin');

//Menu Manajemen Berita
Route::get('/admin/berita/tambah',[App\Http\Controllers\BeritaController::class, 'add'])->middleware('admin');
Route::post('/admin/berita',[App\Http\Controllers\BeritaController::class, 'store'])->middleware('admin');


//Menu di Web
Route::get('/visi', function () { return view('useri.visi'); });
Route::get('/sto', function () { return view('useri.sto'); });
Route::get('/bpd', function () { return view('useri.bpd'); });
Route::get('/pkk', function () { return view('useri.pkk'); });
Route::get('/taruna', function () { return view('useri.taruna'); });
Route::get('/linmas', function () { return view('useri.linmas'); });


//Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
