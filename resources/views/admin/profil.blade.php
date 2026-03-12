@extends('layouts.master')

@section('title')
Profil Pengguna
@endsection

@section('topbar-title')
Apps
@endsection

@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="text-primary p-3 mb-3">
                            <h5 class="text-primary">Profil</h5>
                            <!-- <p class="mb-0">It will seem like simplified</p> -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="align-self-end">
                            <img src="{{ URL::asset('build/images/contact.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row align-items-end">
                    <div class="col-sm-12">
                        <div class="avatar-md mb-3 mt-n4">
                            <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt=""
                                class="img-fluid avatar-circle bg-light p-2 border-2 border-primary">
                        </div>
                        <h5 class="fs-16 mb-1 text-truncate">{{auth()->user()->name}}</h5>
                        <p class="text-muted mb-0 text-truncate">{{$user_detail ? $user_detail->status_dalam_hubungan_keluarga : ''}}</p>
                    </div>

                    <!-- <div class="col-sm-8">
                            <div class="row ms-3">
                                <div class="col-6">
                                    <h5 class="fs-15 mb-1">125</h5>
                                    <p class="text-muted mb-0">Projects</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="fs-15 mb-1">$1245</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>

            <div class="card-body border-top">
                <h4 class="card-title mb-4">Keterangan</h4>
                <!-- <p class="text-muted mb-4">Hi I'm Charlie Stone,has been the industry's standard dummy text To an
                        English person, it will seem like simplified English, as a skeptical Cambridge.</p> -->
                <div class="table-responsive">
                    <table class="table table-nowrap table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th scope="row"><i class="mdi mdi-account align-middle text-primary me-2"></i> Nama Lengkap </th>
                                <td>: {{auth()->user()->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="mdi mdi-account align-middle text-primary me-2"></i> No KK </th>
                                <td>: {{auth()->user()->kk}}</td>
                            </tr>
                            @if($user_detail)
                            <tr>
                                <th scope="row"><i class="mdi mdi-map-marker align-middle text-primary me-2"></i> Alamat </th>
                                <td>: {{$user_detail->alamat}}</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="mdi mdi-map-marker align-middle text-primary me-2"></i> Provinsi </th>
                                <td>: Bali</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="mdi mdi-map-marker align-middle text-primary me-2"></i> Kabupaten </th>
                                <td>: Badung</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="mdi mdi-map-marker align-middle text-primary me-2"></i> Kecamatan </th>
                                <td>: Petang</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="mdi mdi-map-marker align-middle text-primary me-2"></i> Desa </th>
                                <td>: Pelaga</td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="mdi mdi-map-marker align-middle text-primary me-2"></i> Banjar </th>
                                <td>: {{$user_detail->nama}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->


    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Keterangan Anggota Keluarga</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Status Hubungan</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Golongan Darah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluarga as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->tanggal_lahir}}</td>
                            <td>{{$item->jk}}</td>
                            <td>{{$item->status_dalam_hubungan_keluarga}}</td>

                            <td>{{$item->agama}}</td>
                            <td>{{$item->pendidikan}}</td>
                            <td>{{$item->pekerjaan}}</td>
                            <td>{{$item->gol_darah}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('scripts')
<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<!-- Required datatable js -->
<script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<!-- contact init js -->
<script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('build/js/pages/datatables-base.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection