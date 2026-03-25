@extends('layouts.master-without-page-title')

@section('title')
Banjar
@endsection

@section('css')
<link href="{{ URL::asset('build/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
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
                    <li class="breadcrumb-item"><a href="{{url('admin/banjar');}}">Banjar</a></li>
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
                <h4 class="card-title">{{$mode}} Banjar</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ $mode=='Edit' ? '/admin/banjar/'.$banjar->id : '/admin/banjar' }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="nama" class="fw-semibold">Nama Banjar: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Banjar" value="{{ old('nama', $banjar->nama ?? '') }}">
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
                                <label for="alamat" class="fw-semibold">Alamat Banjar: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" cols="30" rows="5" placeholder="Alamat Banjar">{{ old('alamat', $banjar->alamat ?? '') }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="nik_kelian" class="fw-semibold">Nama atau NIK Kelian </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="col-sm-5 col-lg-6">
                                        <div class="mb-2">
                                            <select id="select2-2" name="nik_kelian">
                                                @if($mode='Edit')
                                                    <option value="{{$banjar->user->nik}}">{{$banjar->user->name}}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    @error('nik_kelian')
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
<script src="{{ URL::asset('build/libs/select2/dist/js/select2.min.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>

<script>
    

    $('#select2-2').select2({
        minimumInputLength: 3,
        ajax: {
            url: '/admin/nik-search',
            data: function(params) {
                var query = {
                    q: params.term,
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            }
        }
    });
</script>


@endsection