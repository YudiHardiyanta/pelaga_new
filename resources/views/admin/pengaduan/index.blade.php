@extends('layouts.master-without-page-title')

@section('title')
Layanan Pengaduan
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
                    <li class="breadcrumb-item active">Pengaduan</li>
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
                <h4 class="card-title">Manajemen Pengaduan</h4>
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
                    <div class="col-xl-12">
                        <div class="card-body">
                            <table id="pengaduan" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Pengaduan</th>
                                        <th>Uraian Pengaduan</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
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
    $('#pengaduan').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('pengaduan') }}",
        columns: [{
                data: 'pengaduan_nama',
                name: 'pengaduan_nama',
            },
            {
                data: 'pengaduan_subjek',
                name: 'pengaduan_subjek'
            },
            {
                data: 'pengaduan_uraian',
                name: 'pengaduan_uraian'
            },
            {
                data: 'is_tindak_lanjut',
                name: 'is_tindak_lanjut',
                render: function(data, type, row) {
                    if (data == 1) {
                        return '<button class="btn btn-primary btn-sm">Sudah</button>';
                    } else {
                        return '<button class="btn btn-danger btn-sm">Belum</button>';
                    }
                }
            },
            {
                data: 'pengaduan_alamat',
                name: 'pengaduan_alamat'
            },
            {
                data: 'pengaduan_telepon',
                name: 'pengaduan_telepon'
            },
            {
                data: 'pengaduan_email',
                name: 'pengaduan_email'
            },
            {
                data: 'id',
                name: 'id',
                render: function(data, type, row) {
                    return '<a href="/admin/pengaduan/tanggapi/' + data + '" class="btn btn-primary btn-sm">Tanggapi</a>';
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