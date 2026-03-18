<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\WebController::class,'home']);

//Tes
Route::get('/tes_surat',function(){return view('tes.index');});


//Proses Login
Route::get('/masuk',[App\Http\Controllers\UserController::class,'pageLogin']);
Route::post('/auth',[App\Http\Controllers\UserController::class,'auth']);
Route::post('/keluar',[App\Http\Controllers\UserController::class,'logout'])->middleware('auth')->name('logout');
Route::get('/profile',[App\Http\Controllers\UserController::class,'pageProfile'])->middleware('auth');
Route::post('/reset-password',[App\Http\Controllers\UserController::class,'resetPassword'])->middleware('auth');

//tes Login
Route::get('/tes',[App\Http\Controllers\UserController::class,'tes'])->middleware('auth');


//Menu di Admin
Route::get('/admin',function(){return view('admin.index');})->middleware('admin');
Route::get('/admin/profil',[App\Http\Controllers\UserController::class, 'getAdminUserInfo'])->middleware('admin');


//Menu Manajemen Banjar
Route::get('/admin/banjar',function(){return view('admin.banjar.index');})->middleware('admin');
Route::get('/admin/banjar/tambah',[App\Http\Controllers\BanjarController::class, 'add'])->middleware('admin');
Route::post('/admin/banjar',[App\Http\Controllers\BanjarController::class, 'store'])->middleware('admin');
Route::get('/admin/banjar/edit/{id}',[App\Http\Controllers\BanjarController::class, 'edit'])->middleware('admin');
Route::post('/admin/banjar/{id}',[App\Http\Controllers\BanjarController::class, 'patch'])->middleware('admin');

//API untuk datatable
Route::get('/admin/banjar/list',[App\Http\Controllers\BanjarController::class, 'getByCreated'])->middleware('admin')->name('banjar');
//Autocomplete Banjar
Route::get('/admin/nik-search',[App\Http\Controllers\UserController::class, 'autocomplete'])->middleware('admin');

//Menu Manajemen Role
Route::get('/admin/role',function(){return view('admin.role.index');})->middleware('admin');
Route::get('/admin/role/tambah',[App\Http\Controllers\RoleController::class, 'add'])->middleware('admin');
Route::post('/admin/role',[App\Http\Controllers\RoleController::class, 'store'])->middleware('admin');
Route::get('/admin/role/edit/{id}',[App\Http\Controllers\RoleController::class, 'edit'])->middleware('admin');
Route::post('/admin/role/{id}',[App\Http\Controllers\RoleController::class, 'patch'])->middleware('admin');
//API untuk datatable
Route::get('/admin/role/list',[App\Http\Controllers\RoleController::class, 'getByCreated'])->middleware('admin')->name('role');


//Menu Manajemen Galery


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
Route::get('/admin/penduduk/list',[App\Http\Controllers\PendudukController::class, 'getByCreated'])->middleware('admin')->name('penduduk');


//Menu Manajemen Berita
Route::get('/admin/berita',[App\Http\Controllers\BeritaController::class, 'page'])->middleware('admin');
Route::get('/admin/berita/tambah',[App\Http\Controllers\BeritaController::class, 'add'])->middleware('admin');
Route::post('/admin/berita',[App\Http\Controllers\BeritaController::class, 'store'])->middleware('admin');
Route::post('/admin/berita/{id}',[App\Http\Controllers\BeritaController::class, 'patch'])->middleware('admin');
Route::get('/admin/berita/edit/{id}',[App\Http\Controllers\BeritaController::class, 'edit'])->middleware('admin');
//API untuk datatable
Route::get('/admin/berita/list',[App\Http\Controllers\BeritaController::class, 'getByCreated'])->middleware('admin')->name('berita');


//Menu Manajemen Galery
Route::get('/admin/galery',[App\Http\Controllers\GaleryController::class, 'page'])->middleware('admin');
Route::post('/admin/galery/upload', [App\Http\Controllers\GaleryController::class, 'store'])->middleware('admin')->name('galery.upload');
Route::delete('admin/galery/{id}', [App\Http\Controllers\GaleryController::class, 'delete'])->middleware('admin')->name('galery.delete');

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
Route::get('/berita/{id}', [App\Http\Controllers\WebController::class, 'berita']);


//Menu Pengaduan di web
Route::get('/pengaduan', function () { return view('web.pengaduan'); });
Route::post('/pengaduan',[App\Http\Controllers\PengaduanController::class, 'store'])->name('add_pengaduan');


//Menu Permohonan di web
Route::get('/permohonan',[App\Http\Controllers\PermohonanController::class, 'webpage'])->middleware('auth');
Route::post('/permohonan',function(){return view('web.permohonan');})->middleware('auth');


//Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
