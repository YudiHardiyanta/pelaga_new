@extends('useri.user')

@section('title', 'Dashboard')

@section('content')

    <!-- Hero Start -->
    <div class="container-fluid pb-5 bg-primary hero-header">
        <div class="container py-5">
            <div class="row g-3 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-1 mb-0 animated slideInLeft">Permohonan</h1>
                </div>
                <div class="col-lg-6 animated slideInRight">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-end mb-0">
                            <li class="breadcrumb-item"><a class="text-primary" href="#!">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-primary" href="#!">Pages</a></li>
                            <li class="breadcrumb-item text-secondary active" aria-current="page">Permohonan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
        @endif
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-5">Permohonan Administrasi Penduduk </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <p class="text-center mb-4">Isikan data secara lengkap dan benar </p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">                        
                                <form action="{{ route('permohonan.addproses') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Form Permohonan Administrasi Desa
                                        </div>

                                        <div class="card-body">

                                            <!-- Jenis Surat -->
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Surat</label>
                                                <select name="jenis_surat_id" class="form-control @error('jenis_surat_id') is-invalid @enderror">
                                                    <option value="">-- Pilih Jenis Surat --</option>
                                                    @foreach($jenisSurat as $js)
                                                        <option value="{{ $js->id }}">{{ $js->nama_surat }}</option>
                                                    @endforeach
                                                </select>
                                                @error('jenis_surat_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <hr>

                                            <h5>Data Pemohon</h5>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>NIK</label>
                                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                                                    @error('nik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" value="{{ old('nana_lengkap') }}" class="form-control @error('nama_lengkap') is-invalid @enderror">
                                                    @error('nama_lengkap')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control @error('tempat_lahir') is-invalid @enderror">
                                                    @error('tempat_lahir')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                                                    @error('tanggal_lahir')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control">
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label>Alamat</label>
                                                    <textarea name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" rows="3"></textarea>
                                                    @error('alamat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <hr>

                                            <h5>Data Tambahan (Sesuai Jenis Surat)</h5>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>Mulai Menetap</label>
                                                    <input type="text" name="tanggal_menetap" class="form-control">
                                                </div>

                                                <!-- Contoh untuk Surat Usaha -->
                                                <div class="col-md-6 mb-3">
                                                    <label>Nama Usaha</label>
                                                    <input type="text" name="nama_usaha" class="form-control">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Alamat Usaha</label>
                                                    <input type="text" name="alamat_usaha" class="form-control">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label>Lama Usaha</label>
                                                    <input type="text" name="lama_usaha" class="form-control">
                                                </div>

                                                <!-- Contoh untuk Surat Tidak Mampu -->
                                                <div class="col-md-6 mb-3">
                                                    <label>Penghasilan Perbulan</label>
                                                    <input type="number" name="penghasilan" class="form-control">
                                                </div>

                                            </div>

                                            <hr>

                                            <div class="mb-3">
                                                <label>Upload File Pendukung (KK/KTP)</label>
                                                <input type="file" name="file_pendukung" class="form-control">
                                            </div>

                                        </div>

                                        <div class="card-footer d-flex gap-3">
                                            <button type="submit" class="btn btn-primary">
                                                Simpan
                                            </button>

                                            <button type="reset" class="btn btn-danger">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
 @endsection