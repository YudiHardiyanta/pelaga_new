@extends('layouts.master-without-page-title')

@section('title')
Berita
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
                    <li class="breadcrumb-item"><a href="{{url('admin/berita');}}">Berita</a></li>
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
                <h4 class="card-title">{{$mode}} Berita</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ $mode=='Edit' ? '/admin/berita/'.$berita->id : '/admin/berita' }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label class="fw-semibold">Jenis Berita: </label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control" data-select2-selector="country" name="jenis">
                                    <option value="">Pilih Jenis Berita</option>

                                    <option value="Pemerintah Desa"
                                        {{ old('jenis', $berita->berita_jenis ?? '') == 'Pemerintah Desa' ? 'selected' : '' }}>
                                        Pemerintah Desa
                                    </option>

                                    <option value="Kelompok PKK"
                                        {{ old('jenis', $berita->berita_jenis ?? '') == 'Kelompok PKK' ? 'selected' : '' }}>
                                        Kelompok PKK
                                    </option>

                                    <option value="Karang Taruna"
                                        {{ old('jenis', $berita->berita_jenis ?? '') == 'Karang Taruna' ? 'selected' : '' }}>
                                        Karang Taruna
                                    </option>

                                    <option value="Linmas"
                                        {{ old('jenis', $berita->berita_jenis ?? '') == 'Linmas' ? 'selected' : '' }}>
                                        Linmas
                                    </option>

                                    <option value="Upacara Adat"
                                        {{ old('jenis', $berita->berita_jenis ?? '') == 'Upacara Adat' ? 'selected' : '' }}>
                                        Upacara Adat
                                    </option>

                                    <option value="Pariwisata"
                                        {{ old('jenis', $berita->berita_jenis ?? '') == 'Pariwisata' ? 'selected' : '' }}>
                                        Pariwisata
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="judul" class="fw-semibold">Judul: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Judul Berita" value="{{ old('judul', $berita->berita_title ?? '') }}">
                                    @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="berita" class="fw-semibold">Isi Berita: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <textarea class="form-control @error('berita') is-invalid @enderror" id="berita" name="berita">{{ old('berita', $berita->berita_content ?? '') }}</textarea>
                                    @error('berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        @if($mode=='Edit')
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="status" class="fw-semibold">Aktif atau Nonaktifkan: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="status" {{ $mode=='Edit' && $berita->status ? 'checked="checked"' : ''}}  /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault" ></label>
                                    </div>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        @endif
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label class="fw-semibold">Foto: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-images"></i></div>
                                        @if(!empty($berita->berita_foto))
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/berita/'.$berita->berita_foto) }}" width="150">
                                        </div>
                                        @endif

                                        <input type="file"
                                            class="form-control"
                                            id="foto"
                                            name="foto"
                                            accept="image/*">
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
<script src="{{ URL::asset('build/libs/tinymce/tinymce.min.js') }}"></script>
<script>
    if ($("#berita").length > 0) {
        tinymce.init({
            selector: 'textarea#berita',
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