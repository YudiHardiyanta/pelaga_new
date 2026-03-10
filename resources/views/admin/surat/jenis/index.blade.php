@extends('layouts.master-without-page-title')

@section('title')
Jenis Surat
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
                    <li class="breadcrumb-item active">Jenis Surat</li>
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
                <h4 class="card-title">Manajemen Jenis Surat</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <a href="{{ url('admin/jenis-surat/tambah') }}"><button class="btn btn-primary">Tambah Jenis Surat</button></a>
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
                            <table id="jenisSurat" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Penerbit</th>
                                        <th class="text-end">Aksi</th>
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

<!-- Datatable init js -->
<script>
    $('#jenisSurat').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('jenis-surat') }}",
        columns: [{
                data: 'nama_surat',
                name: 'nama_surat',
            },
            {
                data: 'kode_surat',
                name: 'kode_surat'
            },
            {
                data: 'deskripsi',
                name: 'deskripsi'
            },
            
            {
                data: 'created_at',
                name: 'created_at',
                render: function(data) {
                    let date = new Date(data);
                    return date.toLocaleDateString('id-ID');
                }
            },
            {
                data: 'user.name',
                name: 'user.name'
            },
            {
                data: 'id',
                name: 'id',
                render: function(data, type, row) {
                    return '<a href="/admin/jenis-surat/edit/' + data + '" class="btn btn-primary btn-sm">Edit</a>';
                },
                orderable: false,
                searchable: false
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