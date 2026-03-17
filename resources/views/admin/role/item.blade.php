@extends('layouts.master-without-page-title')

@section('title')
Role
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
                    <li class="breadcrumb-item"><a href="{{url('admin/role');}}">Role</a></li>
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
                <h4 class="card-title">{{$mode}} Role</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ $mode=='Edit' ? '/admin/role/'.$role->id : '/admin/role' }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="nama" class="fw-semibold">Nama Role: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Role" value="{{ old('nama', $role->name ?? '') }}">
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
                                <label for="status" class="fw-semibold">Menu Admin: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="admin" {{ $mode=='Edit' && $role->admin ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('admin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Manajemen Berita: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="berita" {{ $mode=='Edit' && $role->berita ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
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
                                <label for="status" class="fw-semibold">Manajemen Galery: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="galery" {{ $mode=='Edit' && $role->galery ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('galery')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Tanda Tangan Digital: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="ettd" {{ $mode=='Edit' && $role->ettd ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('ettd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Manajemen User: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="users" {{ $mode=='Edit' && $role->users ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('users')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Manajemen Jenis Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="jenis_surat" {{ $mode=='Edit' && $role->jenis_surat ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('jenis_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Manajemen Banjar: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="banjar" {{ $mode=='Edit' && $role->banjar ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
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
                                <label for="status" class="fw-semibold">Manajemen Role: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="role" {{ $mode=='Edit' && $role->role ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Penduduk: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="penduduk" {{ $mode=='Edit' && $role->penduduk ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('penduduk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Manajemen Semua Penduduk: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="penduduk_all" {{ $mode=='Edit' && $role->penduduk_all ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('penduduk_all')
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