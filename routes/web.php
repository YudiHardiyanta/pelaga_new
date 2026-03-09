<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('web.index');
});

//Proses Login
Route::get('/masuk', function () {return view('login'); });
Route::post('/auth',[App\Http\Controllers\UserController::class,'auth']);
Route::get('/keluar',[App\Http\Controllers\UserController::class,'logout'])->middleware('auth')->name('logout');

//tes Login
Route::get('/tes',[App\Http\Controllers\UserController::class,'tes'])->middleware('auth');


//Menu di Admin
Route::get('/admin',function(){return view('admin.index');})->middleware('admin');
Route::get('/admin/pengguna',function(){return view('admin.pengguna');})->middleware('admin');


//Menu Manajemen Berita
Route::get('/admin/berita',[App\Http\Controllers\BeritaController::class, 'page'])->middleware('admin');
Route::get('/admin/berita/tambah',[App\Http\Controllers\BeritaController::class, 'add'])->middleware('admin');
Route::post('/admin/berita',[App\Http\Controllers\BeritaController::class, 'store'])->middleware('admin');
Route::post('/admin/berita/{id}',[App\Http\Controllers\BeritaController::class, 'patch'])->middleware('admin');
Route::get('/admin/berita/edit/{id}',[App\Http\Controllers\BeritaController::class, 'edit'])->middleware('admin');
//API untuk datatable
Route::get('/admin/berita/list',[App\Http\Controllers\BeritaController::class, 'getByCreated'])->middleware('admin')->name('berita');



//Menu Layanan Pengaduan
Route::get('/admin/pengaduan',[App\Http\Controllers\PengaduanController::class, 'page'])->middleware('admin');
Route::get('/admin/pengaduan/tanggapi/{id}',[App\Http\Controllers\PengaduanController::class, 'tanggapi'])->middleware('admin');
Route::post('/admin/pengaduan/{id}',[App\Http\Controllers\PengaduanController::class, 'patch'])->middleware('admin');
//API untuk datatable
Route::get('/admin/pengaduan/list',[App\Http\Controllers\PengaduanController::class, 'getDataTable'])->middleware('admin')->name('pengaduan');



//Menu di Web
Route::get('/visi', function () { return view('useri.visi'); });
Route::get('/sto', function () { return view('useri.sto'); });
Route::get('/bpd', function () { return view('useri.bpd'); });
Route::get('/pkk', function () { return view('useri.pkk'); });
Route::get('/taruna', function () { return view('useri.taruna'); });
Route::get('/linmas', function () { return view('useri.linmas'); });

//Menu di web
Route::get('/pengaduan', function () { return view('web.pengaduan'); });
Route::post('/pengaduan',[App\Http\Controllers\PengaduanController::class, 'store'])->name('add_pengaduan');


//Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
