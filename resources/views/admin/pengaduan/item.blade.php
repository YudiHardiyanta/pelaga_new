@extends('layouts.master-without-page-title')

@section('title')
Pengaduan
@endsection

@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Selamat Datang, <span class="text-primary">{{auth()->user()->name;}}</span></h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('admin');}}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/pengaduan');}}">Pengaduan</a></li>
                    <li class="breadcrumb-item active">{{$mode}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$mode}} Pengaduan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ $mode=='Tanggapi' ? '/admin/pengaduan/'.$pengaduan->id : '/admin/pengaduan' }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="nama" class="fw-semibold">Nama: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ old('nama', $pengaduan->pengaduan_nama ?? '') }}" {{$mode=='Tanggapi' ? "disabled='disabled'":""}}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="jenis" class="fw-semibold">Jenis Pengaduan: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" placeholder="Jenis" value="{{ old('jenis', $pengaduan->pengaduan_subjek ?? '') }}" {{$mode=='Tanggapi' ? "disabled='disabled'":""}}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="telepon" class="fw-semibold">Nomor Telepon: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" placeholder="Telepon" value="{{ old('telepon', $pengaduan->pengaduan_telepon ?? '') }}" {{$mode=='Tanggapi' ? "disabled='disabled'":""}}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="email" class="fw-semibold">Email: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email', $pengaduan->pengaduan_email ?? '') }}" {{$mode=='Tanggapi' ? "disabled='disabled'":""}}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="alamat" class="fw-semibold">Alamat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" cols="30" rows="5" placeholder="Alamat" {{$mode=='Tanggapi' ? "disabled='disabled'":""}}>{{ old('alamat', $pengaduan->pengaduan_alamat ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="pengaduan" class="fw-semibold">Pengaduan: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <textarea class="form-control @error('pengaduan') is-invalid @enderror" id="pengaduan" name="pengaduan" cols="30" rows="5" placeholder="Uraian Pengaduan" {{$mode=='Tanggapi' ? "disabled='disabled'":""}}>{{ old('pengaduan', $pengaduan->pengaduan_uraian ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="tanggapan" class="fw-semibold">Tanggapan Pengaduan: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <textarea class="form-control @error('tanggapan') is-invalid @enderror" id="tanggapan" name="tanggapan" cols="30" rows="5" placeholder="Uraian Tanggapan" >{{ old('tanggapan', $pengaduan->tindak_lanjut ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mt-3 justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-danger px-4">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection

@section('scripts')
<!-- apexcharts -->
<!-- Required datatable js -->
<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection