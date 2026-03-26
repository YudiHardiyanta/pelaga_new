@extends('layouts.master-without-page-title')

@section('title')
Proses Permohonan
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
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item"><a href="/admin/permohonan">Permohonan</a></li>
                    <li class="breadcrumb-item active">Proses</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="text-primary p-3 mb-3">
                            <h5 class="text-primary">Proses Permohonan</h5>
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
                <div class="align-items-end">
                    <div class="row py-3">
                        <div class="col-xl-12">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#info-pemohon" aria-expanded="true" aria-controls="collapseOne">
                                            <i class=" fab fa fa-user me-2 align-middle"></i>Keterangan Pemohon
                                        </button>
                                    </h2>
                                    <div id="info-pemohon" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-nowrap table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nama Pemohon </th>
                                                        <td>: {{$permohonan->nama_pemohon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">NIK Pemohon </th>
                                                        <td>: {{$permohonan->nik_pemohon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Telepon Pemohon </th>
                                                        <td>: {{$permohonan->telepon_pemohon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat Pemohon </th>
                                                        <td>: {{$permohonan->alamat_pemohon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Permohonan </th>
                                                        <td>: {{$permohonan->jenis_surats->nama_surat}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Keterangan Permohonan </th>
                                                        <td>: {{$permohonan->uraian_pemohon}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#dokumen-pemohon" aria-expanded="true" aria-controls="collapseOne">
                                            <i class=" fab fa fa-file-pdf me-2 align-middle"></i>Subject dan Dokumen Pemohon
                                        </button>
                                    </h2>
                                    <div id="dokumen-pemohon" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-nowrap table-borderless mb-0">
                                                <tbody>
                                                    @foreach($permohonan->data_pemohon as $key => $value)
                                                    <tr>
                                                        <th scope="row">{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                                                        <td>: {{ $value }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @if($permohonan->dokumen_pemohon)
                                                    @foreach($permohonan->dokumen_pemohon as $key => $value)
                                                    <tr>
                                                        <th>{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                                                        <td>
                                                            :
                                                            @if(filter_var($value, FILTER_VALIDATE_URL))
                                                            <a href="{{ $value }}" target="_blank" class="text-primary">
                                                                Lihat Dokumen
                                                            </a>
                                                            @else
                                                            {{ $value }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->


    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Preview Surat</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="/admin/permohonan/proses/{{$permohonan->id}}/{{$permohonan->jenis_surats->id}}" method="POST">
                        @csrf
                    <textarea class="col-12 mb-3" id="template_surat" name="template_surat">{{$surat}}</textarea>
                    
                    <div class="d-flex justify-content-end gap-2 mt-2">
                        <button class="btn btn-secondary">Preview</button>
                        <button class="btn btn-primary" type="submit">Proses dan Tanda Tangani</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('scripts')
<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<!-- contact init js -->
<script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/libs/tinymce/tinymce.min.js') }}"></script>
<script>
    if ($("#template_surat").length > 0) {
        tinymce.init({
            selector: 'textarea#template_surat',
            height: 400,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    }
</script>
@endsection