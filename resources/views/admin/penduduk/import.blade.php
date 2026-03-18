@extends('layouts.master-without-page-title')

@section('title')
Import
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
                    <li class="breadcrumb-item"><a href="{{url('admin/penduduk');}}">Penduduk</a></li>
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
                <h4 class="card-title">{{$mode}} Penduduk</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="row mt-2">
                    <div class="alert alert-dismissible alert-success fade show">
                        <div class="alert-icon"><i class="far fa-star"></i></div>
                        <div class="alert-content"><strong>Berhasil!</strong> {{ session('success') }}</div><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
                @endif
                <div class="row">
                    <form action="/admin/penduduk/import"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label class="fw-semibold">Pilih Banjar: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <select class="form-control @error('banjar') is-invalid @enderror" data-select2-selector="country" name="banjar">
                                        <option value="">Pilih Banjar</option>
                                        @foreach($banjar as $bj)
                                        <option value="{{$bj->id}}">
                                            {{$bj->nama}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('banjar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label class="fw-semibold">Pilih File Excel: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-images"></i></div>
                                        <input type="file"
                                            class="form-control @error('excel') is-invalid @enderror"
                                            id="excel"
                                            name="excel"
                                            accept=".xls,.xlsx">
                                        <a href="/template/import_penduduk.xlsx" class="btn btn-primary">Unduh Template</a>
                                        @error('excel')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
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