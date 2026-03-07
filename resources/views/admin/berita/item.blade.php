@extends('layouts.master-without-page-title')

@section('title')
Tambah Berita
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
                    <li class="breadcrumb-item"><a href="{{url('admin/berita');}}">Berita</a></li>
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
                <h4 class="card-title">{{$mode}} Berita</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="/admin/berita" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label class="fw-semibold">Jenis Berita: </label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" data-select2-selector="country" name="jenis" placeholder="Jenis Berita">
                                    <option value="">Pilih Jenis Berita</option>
                                    <option data-country="1">Pemerintah Desa</option>
                                    <option data-country="2">Kelompok PKK</option>
                                    <option data-country="3">Karang Taruna</option>
                                    <option data-country="4">Linmas</option>
                                    <option data-country="5">Upacara Adat</option>
                                    <option data-country="5">Pariwisata</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="judul" class="fw-semibold">Judul: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Judul Berita">
                                    @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="berita" class="fw-semibold">Isi Berita: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                    <textarea class="form-control @error('berita') is-invalid @enderror" id="berita" name="berita" cols="30" rows="5" placeholder="Isi Berita"></textarea>
                                    @error('berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label class="fw-semibold">Foto: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-images"></i></div>
                                        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto" accept="image/*">
                                    </div>
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