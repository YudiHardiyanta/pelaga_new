<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pemerintah Desa Pelaga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="resources/images/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Space+Grotesk&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                <a href="index.html" class="navbar-brand d-flex align-items-center">
                    <img src="resources/images/logo-icon.png" alt="Logo Desa Pelaga" class="me-2 logo-desa">
                    <span class="fw-bold fs-5 text-dark">PEMERINTAH DESA PELAGA</span>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link active">beranda</a>
                        <a href="/permohonan" class="nav-item nav-link">Permohonan</a>
                        <a href="/pengaduan" class="nav-item nav-link">Pengaduan</a>
                        <a href="jdih" class="nav-item nav-link">Peraturan</a>
                        <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="/visi" class="dropdown-item">Visi Misi</a>
                                <a href="/sto" class="dropdown-item">Struktur Organisasi</a>
                                <a href="/bpd" class="dropdown-item">BPD</a>
                                <a href="taruna" class="dropdown-item">Karang Taruna</a>
                                <a href="/pkk" class="dropdown-item">PKK</a>
                                <a href="/linmas" class="dropdown-item">Linmas</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#!" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="/profile" class="dropdown-item">Profile</a>
                                <a href="/logout" class="dropdown-item">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary newsletter p-0">
        <div class="container p-0">
            <div class="row g-0 align-items-center">
                <div class="col-md-5 ps-lg-0 text-start wow fadeIn" data-wow-delay="0.2s">
                    <img class="img-fluid w-100" src="img/newsletter.jpg" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-5">
                        <h1 class="mb-5">Berlangganan <span
                                class="text-uppercase text-primary bg-white px-2">Berita</span></h1>
                        <div class="position-relative w-100 mb-2">
                            <input class="form-control border-0 w-100 ps-4 pe-5" type="text"
                                placeholder="Enter Your Email" style="height: 60px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-2 me-2"><i
                                    class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                        <p class="mb-0">Untuk menambahkan berita bisa melalui email</p>
                    </div>
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
                    <a class="btn btn-link" href="badungkab.go.id">Kabupaten Badung</a>
                    <a class="btn btn-link" href="baliprov.go.id">Provinsi Bali</a>
                    <a class="btn btn-link" href="kemendesa.go.id">Kementrian Desa</a>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="text-white mb-4">Satuan Lingkungan Setempat</h5>
                    <a class="btn btn-link" href="#!">Banjar A</a>
                    <a class="btn btn-link" href="#!">Banjar B</a>
                    <a class="btn btn-link" href="#!">Banjar C</a>
                    <a class="btn btn-link" href="#!">Banjar D</a>
                    <a class="btn btn-link" href="#!">Banjar E</a>
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
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>