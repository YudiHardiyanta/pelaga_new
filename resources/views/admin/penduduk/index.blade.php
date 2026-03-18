@extends('layouts.master-without-page-title')

@section('title')
Penduduk
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
                    <li class="breadcrumb-item active">Penduduk</li>
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
                <h4 class="card-title">Manajemen Penduduk</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <a href="{{ url('admin/penduduk/import') }}"><button class="btn btn-primary">Import Penduduk</button></a>
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
                            <table id="penduduk" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>KK</th>
                                        <th>Alamat</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
                                        <th>Golongan Darah</th>
                                        <th>Status Perkawinan</th>
                                        <th>Tanggal Perkawinan</th>
                                        <th>Status Dalam Hubungan Keluarga</th>
                                        <th>Kewarganegaraan</th>
                                        <th>Banjar</th>
                                    </tr>
                                </thead>
                                <tbody>


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

<script>
    $('#penduduk').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('penduduk') }}",
        columns: [
            {
                data: 'name',
                name: 'users.name',
            },
            {
                data: 'nik',
                name: 'users.nik',
            },
            {
                data: 'kk',
                name: 'users.kk',
            },
            {
                data: 'alamat',
                name: 'penduduks.alamat',
            },
            {
                data: 'tempat_lahir',
                name: 'penduduks.tempat_lahir',
            },
            {
                data: 'tanggal_lahir',
                name: 'penduduks.tanggal_lahir',
                render: function(data) {
                    let date = new Date(data);
                    return date.toLocaleDateString('id-ID');
                }
            },
            {
                data: 'agama',
                name: 'penduduks.agama'
            },
            {
                data: 'pendidikan',
                name: 'penduduks.pendidikan'
            },
            {
                data: 'pekerjaan',
                name: 'penduduks.pekerjaan'
            },
            {
                data: 'gol_darah',
                name: 'penduduks.gol_darah'
            },
            {
                data: 'status_perkawinan',
                name: 'penduduks.status_perkawinan'
            },
            {
                data: 'tanggal_perkawinan',
                name: 'penduduks.tanggal_perkawinan',
                render: function(data) {
                    let date = new Date(data);
                    return date.toLocaleDateString('id-ID');
                }
            },
            {
                data: 'status_dalam_hubungan_keluarga',
                name: 'penduduks.status_dalam_hubungan_keluarga'
            },
            {
                data: 'kewarganegaraan',
                name: 'penduduks.kewarganegaraan'
            },
            {
                data: 'banjar',
                name: 'banjars.nama'
            },
        ],
        "language": {
            "paginate": {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            }
        },
        "drawCallback": function() {
            $('.dataTables_paginate > .pagination').addClass('pagination');
        }
    });
</script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection