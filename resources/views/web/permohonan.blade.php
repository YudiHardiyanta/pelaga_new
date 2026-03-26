@extends('useri.user')

@section('title', 'Dashboard')

@section('content')

<!-- Hero Start -->
<div class="container-fluid pb-5 bg-primary hero-header">
    <div class="container py-5">
        <div class="row g-3 align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-1 mb-0 animated slideInLeft">Permohonan</h1>
            </div>
            <div class="col-lg-6 animated slideInRight">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-end mb-0">
                        <li class="breadcrumb-item"><a class="text-primary" href="/">Beranda</a></li>
                        <li class="breadcrumb-item text-secondary active" aria-current="page">Permohonan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        <div class="text-center wow fadeIn" data-wow-delay="0.1s">
            <h1 class="mb-5">Permohonan Administrasi Penduduk </h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <p class="text-center mb-4">Isikan data secara lengkap dan benar </p>
                <div class="wow fadeIn" data-wow-delay="0.3s">

                    <form action="/permohonan" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nama_pemohon" class="form-control @error('nama_pemohon') is-invalid @enderror" id="nama_pemohon" placeholder="Your Name" value="{{Auth::check()? Auth::user()->name : ''}}" >
                                    <label for="nama_pemohon">Nama Pemohon</label>

                                    @error('nama_pemohon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nik_pemohon" value="{{Auth::check()? Auth::user()->nik : ''}}" class="form-control @error('nik_pemohon') is-invalid @enderror" id="nik_pemohon">
                                    <label for="nik">NIK Pemohon</label>
                                    @error('nik_pemohon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="telepon_pemohon" class="form-control @error('telepon_pemohon') is-invalid @enderror" id="telepon_pemohon" placeholder="Telepon">
                                    <label for="telepon_pemohon">Telepon Pemohon</label>
                                    @error('telepon_pemohon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="alamat_pemohon" class="form-control @error('alamat_pemohon') is-invalid @enderror" id="alamat_pemohon" placeholder="Alamat">
                                    <label for="alamat">Alamat Pemohon</label>
                                    @error('alamat_pemohon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="jenis_surat" id="jenis_surat" class="form-control">
                                        <option value="">-- Pilih Surat --</option>
                                        @foreach($jenis_surat as $sr)
                                        <option value="{{$sr->id}}">{{$sr->nama_surat}}</option>
                                        @endforeach
                                    </select>
                                    <label for="jenis_surat">Jenis Surat</label>
                                    @error('jenis_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <span>Isikan identitas yang akan tertera pada surat</span>
                            </div>
                            <div class="col-md-12">
                                <select name="input_nik_ak" id="ak" class="form-control">
                                    <option value="">Anggota Keluarga yang Diajukan</option>
                                    @if($anggota_keluarga)
                                    @foreach($anggota_keluarga as $item)
                                    <option value="{{$item->nik}}">{{$item->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="row g-3" id="identitas_penduduk">

                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="uraian_pemohon" class="form-control @error('uraian_pemohon') is-invalid @enderror">{{ old('uraian_pemohon') }}</textarea>
                                    <label for="message">Keperluan</label>
                                    @error('uraian_pemohon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jenisSurat = document.getElementById('jenis_surat');

        if (jenisSurat) {
            jenisSurat.addEventListener('change', function() {
                let wrapper = document.getElementById('identitas_penduduk');
                wrapper.innerHTML = '';
                fetch(`/jenis-surat/get/${this.value}`)
                    .then(response => response.json())
                    .then(data => {
                        penduduk_var = JSON.parse(data.data.parameter_penduduk)
                        if (penduduk_var) {
                            penduduk_var.forEach(item => {
                                Object.entries(item).forEach(([key, value]) => {
                                    let html = `
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input id="` + value + `" type="text" name="input_` + key + `" class="form-control @error('` + key + `') is-invalid @enderror" placeholder="` + key + `">
                                                <label for="alamat">Identitas ` + key.split('_')
                                        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                                        .join(' '); +
                                    `</label>
                                            </div>
                                        </div>
                                    `;
                                    wrapper.insertAdjacentHTML('beforeend', html);

                                });
                            });

                        }
                        lain_var = JSON.parse(data.data.parameter_lain)
                        if (lain_var) {
                            lain_var.forEach(item => {
                                Object.entries(item).forEach(([key, value]) => {
                                    let html = `
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input id="` + value + `" type="text" name="input_` + key + `" class="form-control @error('` + key + `') is-invalid @enderror" placeholder="` + key + `">
                                                <label for="alamat">Identitas ` + key.split('_')
                                        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                                        .join(' '); +
                                    `</label>
                                            </div>
                                        </div>
                                    `;
                                    wrapper.insertAdjacentHTML('beforeend', html);

                                });
                            });

                        }







                    })
                    .catch(error => console.error(error));
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const anggota_keluarga = document.getElementById('ak');
        if (ak) {
            ak.addEventListener('change', function() {
                console.log(this.value)
                if (this.value != '') {
                    fetch(`/penduduk/${this.value}`)
                        .then(response => response.json())
                        .then(data => {
                            Object.keys(data.data).forEach(key => {
                                const input = document.getElementById(key);
                                if (input) {
                                    input.value = data.data[key];
                                }
                            });
                        })
                        .catch(error => console.error(error));
                }

            })
        }
    });
</script>