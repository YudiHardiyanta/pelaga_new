@extends('useri.user')

@section('title', 'Dashboard')

@section('content')

<!-- Hero Start -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.css') }}">
<div class="container-fluid pb-5 bg-primary hero-header">
    <div class="container py-5">
        <div class="row g-3 align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-1 mb-0 animated slideInLeft">Profil Pengguna</h1>
            </div>
            <div class="col-lg-6 animated slideInRight">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-end mb-0">
                        <li class="breadcrumb-item"><a class="text-primary" href="/">Beranda</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="/profile">Profil</a></li>
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
            <h1 class="mb-5">Selamat Datang <span class="text-uppercase text-primary bg-light px-2">{{auth()->user()->name;}}</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <p class="text-center mb-4">Profil Selengkapnya</p>
                <div class="wow fadeIn" data-wow-delay="0.3s">

                    <form action="" method="">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Tuliskan Nama Lengkap" disabled value="{{auth()->user()->name}}">
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
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Tuliskan Alamat Email" disabled value="{{auth()->user()->email}}">
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
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" disabled value="{{auth()->user()->nik}}">
                                    <label for="nik">NIK</label>
                                    @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="kk" class="form-control @error('kk') is-invalid @enderror" id="kk" placeholder="KK" disabled value="{{auth()->user()->kk}}">
                                    <label for="telepon">KK</label>
                                    @error('kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            @if($identitas_penduduk)
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" disabled value="{{$identitas_penduduk->alamat}}">
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            @endif()
                            <div class="col-4">
                                <button class="btn btn-danger w-100 py-3" type="button" onclick='resetPassword()'>Reset Password</button>
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
<script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    async function resetPassword() {
        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = tokenMeta ? tokenMeta.getAttribute('content') : '';
        Swal.fire({
            title: "Reset Password",
            html: `<input id="old_password" type="password" class="swal2-input" placeholder="Password Lama">` +
                `<input id="new_password" type="password" class="swal2-input" placeholder="Password Baru">` +
                `<input id="confirm_password" type="password" class="swal2-input" placeholder="Konfirmasi Password Baru">`,
            showCancelButton: true,
            confirmButtonText: "Simpan",
            showLoaderOnConfirm: true,
            preConfirm: async () => {
                const oldPassword = document.getElementById('old_password').value;
                const newPassword = document.getElementById('new_password').value;
                const confirmPassword = document.getElementById('confirm_password').value;

                // ✅ validasi frontend
                if (!oldPassword || !newPassword || !confirmPassword) {
                    return Swal.showValidationMessage("Semua field wajib diisi");
                }

                if (newPassword !== confirmPassword) {
                    return Swal.showValidationMessage("Konfirmasi password tidak cocok");
                }

                try {
                    const response = await fetch('/reset-password', {
                        method: 'POST',
                        credentials: 'same-origin', // ✅ PENTING
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            old_password: oldPassword,
                            new_password: newPassword,
                            confirm_password: confirmPassword
                        })
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        return Swal.showValidationMessage(result.message || "Gagal");
                    }

                    return result;

                } catch (error) {
                    return Swal.showValidationMessage(`Request gagal: ${error}`);
                }
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: result.value.message || "Password berhasil diubah"
                });
            }
        });
    }
</script>