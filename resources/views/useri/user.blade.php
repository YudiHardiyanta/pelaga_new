<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pemerintah Desa Pelaga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('resources/images/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Space+Grotesk&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom border-2 border-white">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('resources/images/logo-icon.png')}}" alt="Logo Desa Pelaga" class="me-2 logo-desa">
                    <span class="fw-bold fs-5 text-dark">PEMERINTAH DESA PELAGA</span>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link active">Beranda</a>
                        <a href="/permohonan" class="nav-item nav-link">Permohonan</a>
                        <a href="/pengaduan" class="nav-item nav-link">Pengaduan</a>
                        <a href="/terbaru" class="nav-item nav-link">Berita</a>
                        <a href="/jdih" class="nav-item nav-link">Peraturan</a>
                        <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="/visi" class="dropdown-item">Visi Misi</a>
                                <a href="/sto" class="dropdown-item">Struktur Organisasi</a>
                                <a href="/bpd" class="dropdown-item">BPD</a>
                                <a href="/taruna" class="dropdown-item">Karang Taruna</a>
                                <a href="/pkk" class="dropdown-item">PKK</a>
                                <a href="/linmas" class="dropdown-item">Linmas</a>
                                <a href="/kontak" class="dropdown-item">Kontak</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            @auth
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="/profile" class="dropdown-item">Profile</a>
                                @can('admin-menu')
                                <a href="/admin" class="dropdown-item">Admin</a>
                                @endcan
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Keluar
                                    </button>
                                </form>
                            </div>
                            @endauth

                            @guest
                            <a href="/masuk" class="nav-link">Login</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary py-5">
        <div class="container">
            <div class="row align-items-center g-4 bg-white rounded shadow overflow-hidden">

                <!-- Google Maps -->
                <div class="p-4">
                    <h4 class="mb-4 text-primary text-center">Lokasi Desa Pelaga</h4>

                    <div class="ratio ratio-21x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d75120.93681376587!2d115.16707816401717!3d-8.297036659056834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd18a3ed8f6cf27%3A0x5030bfbca82fae0!2sPelaga%2C%20Kec.%20Petang%2C%20Kabupaten%20Badung%2C%20Bali!5e0!3m2!1sid!2sid!4v1771732530138!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>
        </div>
        <!-- Newsletter End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                        <a href="index.html" class="d-inline-block mb-3">
                            <h1 class="text-white">Desa Pelaga</h1>
                        </a>
                        <p class="mb-0">Kantor Desa Pelaga (Kantor Perbekel Pelaga) terletak di Jl. Bima No. 2, Pelaga, Kecamatan Petang, Kabupaten Badung, Bali. Kantor ini berfungsi sebagai pusat pemerintahan desa yang dipimpin oleh Perbekel, melayani administrasi warga, serta mengelola potensi wilayah, termasuk sektor pertanian dan wisata.</p>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                        <h5 class="text-white mb-4">Kontak</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Jl. Bima No. 2, Pelaga, Petang, Kabupaten Badung, Bali.</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+62-878-7974-32</p>
                        <p><i class="fa fa-envelope me-3"></i>pelaga.de.id</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://www.facebook.com/pelagaku"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://www.youtube.com/watch?v=aC-7AAZfkWc&t=3s"><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://www.instagram.com/pelagaku/"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                        <h5 class="text-white mb-4">Popular Link</h5>
                        <a class="btn btn-link" href="https://badungkab.go.id" target="_blank">Kabupaten Badung</a>
                        <a class="btn btn-link" href="https://baliprov.go.id">Provinsi Bali</a>
                        <a class="btn btn-link" href="https://kemendesa.go.id">Kementrian Desa</a>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                        <h5 class="text-white mb-4">Satuan Lingkungan Setempat</h5>
                        <a class="btn btn-link" href="#!">Banjar Semanik</a>
                        <a class="btn btn-link" href="#!">Banjar Kiadan</a>
                        <a class="btn btn-link" href="#!">Banjar Nungnung</a>
                        <a class="btn btn-link" href="#!">Banjar Pelaga</a>
                        <a class="btn btn-link" href="#!">Banjar Tiyingan</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>