<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('web.index');
});

//Proses Login
Route::get('/masuk', function () {return view('login'); });
Route::post('/auth',[App\Http\Controllers\UserController::class,'auth']);
Route::post('/keluar',[App\Http\Controllers\UserController::class,'logout'])->middleware('auth')->name('logout');

//tes Login
Route::get('/tes',[App\Http\Controllers\UserController::class,'tes'])->middleware('auth');


//Menu di Admin
Route::get('/admin',function(){return view('admin.index');})->middleware('admin');

//Menu Manajemen Pengguna
Route::get('/admin/pengguna',function(){return view('admin.pengguna.index');})->middleware('admin');
Route::get('/admin/pengguna/edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->middleware('admin');
Route::post('/admin/pengguna/{id}',[App\Http\Controllers\UserController::class, 'patchRole'])->middleware('admin');
//API untuk datatable
Route::get('/admin/pengguna/list',[App\Http\Controllers\UserController::class, 'getUsers'])->middleware('admin')->name('pengguna');

//Menu Manajemen Penduduk
Route::get('/admin/penduduk',function(){return view('admin.penduduk.index');})->middleware('admin');
Route::get('/admin/penduduk/import',[App\Http\Controllers\PendudukController::class, 'pageImport'])->middleware('admin');
Route::post('/admin/penduduk/import',[App\Http\Controllers\PendudukController::class, 'doImport'])->middleware('admin');


//Menu Manajemen Berita
Route::get('/admin/berita',[App\Http\Controllers\BeritaController::class, 'page'])->middleware('admin');
Route::get('/admin/berita/tambah',[App\Http\Controllers\BeritaController::class, 'add'])->middleware('admin');
Route::post('/admin/berita',[App\Http\Controllers\BeritaController::class, 'store'])->middleware('admin');
Route::post('/admin/berita/{id}',[App\Http\Controllers\BeritaController::class, 'patch'])->middleware('admin');
Route::get('/admin/berita/edit/{id}',[App\Http\Controllers\BeritaController::class, 'edit'])->middleware('admin');
//API untuk datatable
Route::get('/admin/berita/list',[App\Http\Controllers\BeritaController::class, 'getByCreated'])->middleware('admin')->name('berita');


//Menu Manajemen Jenis Surat
Route::get('/admin/jenis-surat',[App\Http\Controllers\SuratController::class, 'jenisSuratPage'])->middleware('admin');
Route::get('/admin/jenis-surat/tambah',[App\Http\Controllers\SuratController::class, 'addJenisSurat'])->middleware('admin');
Route::post('/admin/jenis-surat',[App\Http\Controllers\SuratController::class, 'storeJenisSurat'])->middleware('admin');
Route::get('/admin/jenis-surat/edit/{id}',[App\Http\Controllers\SuratController::class, 'editJenisSurat'])->middleware('admin');
Route::post('/admin/jenis-surat/{id}',[App\Http\Controllers\SuratController::class, 'patchJenisSurat'])->middleware('admin');
//API untuk datatable
Route::get('/admin/jenis-surat/list',[App\Http\Controllers\SuratController::class, 'getJenisSurat'])->middleware('admin')->name('jenis-surat');


//Menu Layanan Pengaduan
Route::get('/admin/pengaduan',[App\Http\Controllers\PengaduanController::class, 'page'])->middleware('admin');
Route::get('/admin/pengaduan/tanggapi/{id}',[App\Http\Controllers\PengaduanController::class, 'tanggapi'])->middleware('admin');
Route::post('/admin/pengaduan/{id}',[App\Http\Controllers\PengaduanController::class, 'patch'])->middleware('admin');
//API untuk datatable
Route::get('/admin/pengaduan/list',[App\Http\Controllers\PengaduanController::class, 'getDataTable'])->middleware('admin')->name('pengaduan');

//Menu Layanan Permohonan
Route::get('/admin/permohonan',[App\Http\Controllers\PengaduanController::class, 'page'])->middleware('admin');


//Menu di Web
Route::get('/visi', function () { return view('useri.visi'); });
Route::get('/sto', function () { return view('useri.sto'); });
Route::get('/bpd', function () { return view('useri.bpd'); });
Route::get('/pkk', function () { return view('useri.pkk'); });
Route::get('/taruna', function () { return view('useri.taruna'); });
Route::get('/linmas', function () { return view('useri.linmas'); });


//Menu Pengaduan di web
Route::get('/pengaduan', function () { return view('web.pengaduan'); });
Route::post('/pengaduan',[App\Http\Controllers\PengaduanController::class, 'store'])->name('add_pengaduan');


//Menu Permohonan di web
Route::get('/permohonan',[App\Http\Controllers\PermohonanController::class, 'webpage'])->middleware('auth');
Route::post('/permohonan',function(){return view('web.permohonan');})->middleware('auth');


//Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
