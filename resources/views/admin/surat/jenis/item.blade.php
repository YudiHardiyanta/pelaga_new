@extends('layouts.master-without-page-title')

@section('title')
Jenis Surat
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
                    <li class="breadcrumb-item"><a href="{{url('admin/jenis-surat');}}">Jenis Surat</a></li>
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
                <h4 class="card-title">{{$mode}} Jenis Surat</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ $mode=='Edit' ? '/admin/jenis-surat/'.$jenis_surat->id : '/admin/jenis-surat' }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="nama" class="fw-semibold">Nama Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Surat" value="{{ old('nama', $jenis_surat->nama_surat ?? '') }}">
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
                                <label for="kode" class="fw-semibold">Kode Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-type-h1"></i></div>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Kode Surat" value="{{ old('kode', $jenis_surat->kode_surat ?? '') }}">
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="deskripsi" class="fw-semibold">Deskripsi Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" cols="30" rows="5" placeholder="Isi deskripsi">{{ old('deskripsi', $jenis_surat->deskripsi ?? '') }}</textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="kelian_ttd" class="fw-semibold">Kelian TTD atau Mengetahui: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="kelian_ttd" {{ $mode=='Edit' && $jenis_surat->kelian_ttd ? 'checked="checked"' : ''}} /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault"></label>
                                    </div>
                                    @error('kelian_ttd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="kepala_desa_ttd" class="fw-semibold">Kepala Desa TTD atau Mengetahui: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="kepala_desa_ttd" {{ $mode=='Edit' && $jenis_surat->kepala_desa_ttd ? 'checked="checked"' : ''}} /> <label class="form-check-label"
                                            for="flexSwitchCheckDefault"></label>
                                    </div>
                                    @error('kepala_desa_ttd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="deskripsi" class="fw-semibold">Template Surat: </label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <textarea id="template_surat" name="template_surat">{{ old('template_surat', $jenis_surat->template_surat ?? '') }}</textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="kepala_desa_ttd" class="fw-semibold">Parameter Penduduk</label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div id="parameter_penduduk_wrapper">
                                        @if($jenis_surat->parameter_penduduk)

                                        @php
                                        $data_penduduk = json_decode($jenis_surat->parameter_penduduk, true);
                                        @endphp

                                        @foreach($data_penduduk as $item)
                                        @foreach ($item as $key => $value)
                                        <div class="row mb-2 key-value-item">

                                            {{-- KEY --}}
                                            <div class="col-md-5">
                                                <input type="text" name="penduduk_keys[]" class="form-control"
                                                    placeholder="Key Pada Surat" value="{{ $key }}">
                                            </div>

                                            {{-- VALUE (SELECT) --}}
                                            <div class="col-md-5">
                                                <select name="penduduk_values[]" class="form-control">
                                                    <option value="">-- Pilih Variable Penduduk --</option>

                                                    <option value="name" {{ $value == 'name' ? 'selected' : '' }}>Nama Penduduk</option>
                                                    <option value="jk" {{ $value == 'jk' ? 'selected' : '' }}>Jenis Kelamin</option>
                                                    <option value="nik" {{ $value == 'nik' ? 'selected' : '' }}>NIK</option>
                                                    <option value="kk" {{ $value == 'kk' ? 'selected' : '' }}>KK</option>
                                                    <option value="alamat" {{ $value == 'alamat' ? 'selected' : '' }}>Alamat</option>
                                                    <option value="tempat_lahir" {{ $value == 'tempat_lahir' ? 'selected' : '' }}>Tempat Lahir</option>
                                                    <option value="tanggal_lahir" {{ $value == 'tanggal_lahir' ? 'selected' : '' }}>Tanggal Lahir</option>
                                                    <option value="agama" {{ $value == 'agama' ? 'selected' : '' }}>Agama</option>
                                                    <option value="pendidikan" {{ $value == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                                    <option value="pekerjaan" {{ $value == 'pekerjaan' ? 'selected' : '' }}>Pekerjaan</option>
                                                    <option value="gol_darah" {{ $value == 'gol_darah' ? 'selected' : '' }}>Golongan Darah</option>
                                                    <option value="status_perkawinan" {{ $value == 'status_perkawinan' ? 'selected' : '' }}>Status Perkawinan</option>
                                                    <option value="tanggal_perkawinan" {{ $value == 'tanggal_perkawinan' ? 'selected' : '' }}>Tanggal Perkawinan</option>
                                                    <option value="status_dalam_hubungan_keluarga" {{ $value == 'status_dalam_hubungan_keluarga' ? 'selected' : '' }}>Status Dalam Hubungan Keluarga</option>
                                                    <option value="kewarganegaraan" {{ $value == 'kewarganegaraan' ? 'selected' : '' }}>Kewarganegaraan</option>

                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger remove-item">Hapus</button>
                                            </div>

                                        </div>
                                        @endforeach
                                        @endforeach

                                        @endif
                                    </div>



                                    @error('kepala_desa_ttd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="button" id="add-item" class="btn btn-primary mb-3">Tambah</button>

                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-3">
                                <label for="kepala_desa_ttd" class="fw-semibold">Parameter Lainnya</label>
                            </div>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <div id="parameter_lainnya_wrapper">
                                        @if($jenis_surat->parameter_lain)

                                        @php
                                        $data_lain = json_decode($jenis_surat->parameter_lain, true);
                                        @endphp

                                        @foreach($data_lain as $item)
                                        @foreach ($item as $key => $value)
                                        <div class="row mb-2 key-value-item">
                                            <div class="col-md-5">
                                                <input type="text" name="lain_keys[]" class="form-control"
                                                    placeholder="Key Pada Surat" value="{{ $key }}">
                                            </div>

                                            <div class="col-md-5">
                                                <input type="text" name="lain_values[]" class="form-control"
                                                    placeholder="Value Pada Surat" value="{{ $value }}">
                                            </div>

                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger remove-item">Hapus</button>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endforeach

                                        @endif
                                    </div>



                                    @error('kepala_desa_ttd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="button" id="add-item-lainnya" class="btn btn-primary mb-3">Tambah</button>

                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-3 justify-content-end">
                            <button type="button" class="btn btn-secondary px-4">
                                Preview
                            </button>
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

<script>
    // =======================
    // FORM 1: PARAMETER PENDUDUK
    // =======================
    document.getElementById('add-item').addEventListener('click', function() {
        let wrapper = document.getElementById('parameter_penduduk_wrapper');

        let html = `
        <div class="row mb-2 key-value-item">
            <div class="col-md-5">
                <input type="text" name="penduduk_keys[]" class="form-control" placeholder="Key Pada Surat">
            </div>

            <div class="col-md-5">
                <select name="penduduks_values[]" class="form-control">
                    <option value="">-- Pilih Variable Penduduk --</option>
                    <option value="name">Nama Penduduk</option>
                    <option value="jk">Jenis Kelamin</option>
                    <option value="nik">NIK</option>
                    <option value="kk">KK</option>
                    <option value="alamat">Alamat</option>
                    <option value="tempat_lahir">Tempat Lahir</option>
                    <option value="tanggal_lahir">Tanggal Lahir</option>
                    <option value="agama">Agama</option>
                    <option value="pendidikan">Pendidikan</option>
                    <option value="pekerjaan">Pekerjaan</option>
                    <option value="gol_darah">Golongan Darah</option>
                    <option value="status_perkawinan">Status Perkawinan</option>
                    <option value="tanggal_perkawinan">Tanggal Perkawinan</option>
                    <option value="status_dalam_hubungan_keluarga">Status Dalam Hubungan Keluarga</option>
                    <option value="kewarganegaraan">Kewarganegaraan</option>
                </select>
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-item">Hapus</button>
            </div>
        </div>
    `;

        wrapper.insertAdjacentHTML('beforeend', html);
    });


    // =======================
    // FORM 2: PARAMETER LAINNYA
    // =======================
    document.getElementById('add-item-lainnya').addEventListener('click', function() {
        let wrapper = document.getElementById('parameter_lainnya_wrapper');

        let html = `
        <div class="row mb-2 key-value-item">
            <div class="col-md-5">
                <input type="text" name="lain_keys[]" class="form-control" placeholder="Key Pada Surat">
            </div>

            <div class="col-md-5">
                <input type="text" name="lain_values[]" class="form-control" placeholder="Value Pada Surat">
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-item">Hapus</button>
            </div>
        </div>
    `;

        wrapper.insertAdjacentHTML('beforeend', html);
    });


    // =======================
    // GLOBAL REMOVE (untuk semua form)
    // =======================
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.key-value-item').remove();
        }
    });
</script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection