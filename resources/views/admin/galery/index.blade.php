@extends('layouts.master-without-page-title')

@section('title')
Galery
@endsection

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />


<!-- Responsive datatable examples -->
<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
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
                    <li class="breadcrumb-item active">Galery</li>
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
                <h4 class="card-title">Manajemen Galery</h4>
            </div>
            <div class="card-body">
                <div class="row py-3">
                    <div class="col-xl-12">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class=" fab fa-telegram-plane me-2 align-middle"></i>Tambah Galery
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="/admin/galery/upload"
                                            class="dropzone"
                                            id="galleryDropzone">
                                            @csrf
                                            <select name='kegiatan' class="form-control" id="kegiatan">
                                                <option value="desa">Desa</option>
                                                <option value="bpd">BPD</option>
                                                <option value="pkk">PKK</option>
                                                <option value="taruna">Karang Taruna</option>
                                                <option value="linmas">Linmas</option>
                                                <option value="ceremony">Ceremoy</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                
                <ul class="list-group mt-4">
                    @foreach($galleries as $item)
                    <li class="list-group-item d-flex align-items-center justify-content-between">

                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/galery/'.$item->image) }}"
                                width="80" class="me-3">
                            <span>{{ $item->image }}</span>
                            
                        </div>
                        @if($item->kegiatan)
                        <div class="d-flex align-items-center">
                            <button class="btn btn-success">{{ $item->kegiatan }}</button>
                        </div>
                        @endif

                        <form action="{{ route('galery.delete', $item->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>HAPUS
                            </button>
                        </form>

                    </li>
                    @endforeach
                </ul>
                <!-- 🔥 Pagination -->
                <ul class="pagination mb-0">

                    {{-- Previous --}}
                    <li class="page-item {{ $galleries->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $galleries->previousPageUrl() ?? '#' }}">
                            Previous
                        </a>
                    </li>

                    {{-- Nomor halaman --}}
                    @for ($i = 1; $i <= $galleries->lastPage(); $i++)
                        <li class="page-item {{ $galleries->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $galleries->url($i) }}">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor

                        {{-- Next --}}
                        <li class="page-item {{ $galleries->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $galleries->nextPageUrl() ?? '#' }}">
                                Next
                            </a>
                        </li>

                </ul>



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

</script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script>
    Dropzone.options.galleryDropzone = {
        maxFilesize: 2,
        acceptedFiles: 'image/*',

        init: function() {
            this.on("sending", function(file, xhr, formData) {
                let kegiatan = $('#kegiatan').val();

                formData.append('kegiatan', kegiatan); // 🔥 kirim parameter
            });
        },

        success: function(file, response) {
            console.log('Upload sukses');
            location.reload();
        }
    };
</script>
@endsection