@extends('useri.user')

@section('title', 'Dashboard')

@section('content')

<!-- Hero Start -->
<div class="container-fluid pb-5 bg-primary hero-header">
    <div class="container py-5">
        <div class="row g-3 align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-1 mb-0 animated slideInLeft">Pengaduan</h1>
            </div>
            <div class="col-lg-6 animated slideInRight">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-end mb-0">
                        <li class="breadcrumb-item"><a class="text-primary" href="/">Beranda</a></li>
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
            <h1 class="mb-5">Apa yang bisa kami bantu? <span class="text-uppercase text-primary bg-light px-2">Hubungi
                    Kami</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <p class="text-center mb-4">Jika ada yang ingin di informasikan kepada Pemerintah Desa Pelaga bisa menghubungi kami dengan menuliskan pesan disini. Terima Kasih </p>
                <div class="wow fadeIn" data-wow-delay="0.3s">

                    <form action="/pengaduan" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Tuliskan Nama Lengkap">
                                    <label for="name">Nama Lengkap</label>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Tuliskan Alamat Email">
                                    <label for="email">Email</label>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Telepon">
                                    <label for="telepon">Telepon</label>
                                    @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat">
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Keterkaitan Pengaduan">
                                    <label for="subject">Keterkaitan Pengaduan</label>
                                    @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea cols="30" rows="5" name="uraian" class="form-control @error('uraian') is-invalid @enderror">{{ old('uraian') }}</textarea>
                                    <label for="message">Uraian Pengaduan</label>
                                    @error('uraian')
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