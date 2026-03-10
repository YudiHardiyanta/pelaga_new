@extends('layouts.master-without-page-title')

@section('title')
Jenis Surat
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
                    <li class="breadcrumb-item"><a href="{{url('admin/jenis-surat');}}">Jenis Surat</a></li>
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
                <h4 class="card-title">{{$mode}} Jenis Surat</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ $mode=='Edit' ? '/admin/jenis-surat/'.$jenis_surat->id : '/admin/jenis-surat' }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="nama" class="fw-semibold">Nama Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Surat" value="{{ old('nama', $jenis_surat->nama_surat ?? '') }}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="kode" class="fw-semibold">Kode Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Kode Surat" value="{{ old('kode', $jenis_surat->kode_surat ?? '') }}">
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="deskripsi" class="fw-semibold">Deskripsi Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" cols="30" rows="5" placeholder="Isi deskripsi">{{ old('deskripsi', $jenis_surat->deskripsi ?? '') }}</textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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