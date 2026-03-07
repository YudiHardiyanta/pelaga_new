@extends('layouts.master-without-page-title')

@section('title')
Berita
@endsection

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
    type="text/css" />
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
                    <li class="breadcrumb-item active">Berita</li>
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
                <h4 class="card-title">Manajemen Berita</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <a href="{{ url('admin/berita/tambah') }}"><button class="btn btn-primary">Tambah Berita</button></a>
                </div>
                @if(session('success'))
                <div class="row mt-2">
                    <div class="alert alert-dismissible alert-success fade show">
                        <div class="alert-icon"><i class="far fa-star"></i></div>
                        <div class="alert-content"><strong>Berhasil!</strong> {{ session('success') }}</div><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-body">
                            <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th scope="row">Judul</th>
                                        <th>Deskripsi Singkat</th>
                                        <th>Tanggal</th>
                                        <th>Penerbit</th>
                                        <th>Status</th>
                                        <th class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tes Berita</td>
                                        <td>Tes Deskripsi</td>
                                        <td>Tes Tanggal</td>
                                        <td>Penerbit</td>
                                        <td class="text-center"><a href="#" class="btn btn-sm btn-primary">Aktif</a></td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-secondary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end col -->

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
<script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('build/js/pages/datatables-base.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>


<script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection