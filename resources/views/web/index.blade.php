@extends('useri.user')

@section('title', 'Dashboard')

@section('content')

<style>
    .gallery-img {
        height: 250px;
        /* 🔥 samakan tinggi */
        object-fit: cover;
        /* 🔥 crop otomatis */
    }
</style>

<!-- Hero Start -->
<div class="container-fluid pb-5 hero-header bg-light mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-6">
                <h1 class="display-1 fw-bold mb-4 animated slideInRight">
                    Selamat Datang di <span class="text-primary fw-bold">Desa</span> Pelaga
                </h1>
                <a href="/permohonan">
                    <button class="btn btn-primary">
                        Permohonan
                    </button>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/pengaduan">
                    <button class="btn btn-danger">
                        Pengaduan
                    </button>
                </a>
            </div>
            <div class="col-lg-6">
                <div class="owl-carousel header-carousel animated fadeIn">
                    <img class="img-fluid" src="img/hero-slider-1.jpg" alt="">
                    <img class="img-fluid" src="img/hero-slider-2.jpg" alt="">
                    <img class="img-fluid" src="img/hero-slider-3.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="row g-5 animated fadeIn">
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://www.instagram.com/pelagaku" target="_blank">
                            <img src="img/instagram.png" width="40px" alt="">
                        </a>
                    </div>
                    <h5 class="lh-base mb-0">Instagram</h5>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://www.facebook.com/pelagaku/ " target="_blank">
                            <img src="img/facebook.png" width="40px" alt="">
                        </a>
                    </div>
                    <h5 class="lh-base mb-0">Facebook</h5>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#">
                            <img src="img/tiktok.png" width="40px" alt="">
                        </a>
                    </div>
                    <h5 class="lh-base mb-0">TikTok</h5>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://wa.me/62878797432" target="_blank">
                            <img src="img/whatsapp.png" width="40px" alt="">
                        </a>
                    </div>
                    <h5 class="lh-base mb-0">WhatsApp</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Start -->

<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center wow fadeIn" data-wow-delay="0.1s">
            <h1 class="mb-5">Pelayanan Publik</span>
            </h1>
        </div>
        <div class="row g-5 align-items-center text-center">
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-calendar-alt fa-5x text-primary mb-4"></i>
                <h4>Surat Keterangan</h4>
                <p class="mb-0">Pengurusan berbagai surat keterangan seperti surat domisili, surat keterangan usaha, surat keterangan kelahiran dan lain sebagainya</p>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-tasks fa-5x text-primary mb-4"></i>
                <h4>Perijinan</h4>
                <p class="mb-0">Pengurusan berbagai perijinan seperti surat ijin usaha, ijin penggunaan lahan dan lain sebagainya</p>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-pencil-ruler fa-5x text-primary mb-4"></i>
                <h4>Pengaduan</h4>
                <p class="mb-0">Melakukan pengaduan kepada pemerintah desa bila ada kejadian yang tidak diinginkan seperti pohon tumbang, tanah longsor dan lain sebagainya</p>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-user fa-5x text-primary mb-4"></i>
                <h4>Kependudukan</h4>
                <p class="mb-0">Melakukan pencatatan administrasi kependudukan seperti surat pengantar pengurusan KTP, surat keterangan lahir dan lain sebagainya</p>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-hand-holding-usd fa-5x text-primary mb-4"></i>
                <h4>Bantuan Sosial</h4>
                <p class="mb-0">Pengurusan berbagai bantuan sosial</p>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-check fa-5x text-primary mb-4"></i>
                <h4>Proposal</h4>
                <p class="mb-0">Pengajuan proposal</p>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Project Start -->
<div class="container-fluid mt-5" id="galery">
    <div class="container mt-5">
        <div class="row g-0">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column justify-content-center bg-primary h-100 p-5">
                    <h1 class="text-white mb-5">Galery</h1>
                    <h4 class="text-white mb-0"></h4>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row g-0">
                    @foreach($galery as $g)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.2s">
                        <div class="project-item position-relative overflow-hidden">
                            <img class="img-fluid w-100 gallery-img" src="{{ asset('storage/galery/'.$g->last_image) }}" alt="">
                            <a class="project-overlay text-decoration-none" href="{{$g->kegiatan? '/galery/'.$g->kegiatan : '#'}}">
                                <h4 class="text-white">{{$g->kegiatan?$g->kegiatan : 'Desa Pelaga'}}</h4>
                                <small class="text-white">{{$g->total}} Gambar</small>
                            </a>
                        </div>
                    </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project End -->

<!-- Service Start -->
@if($berita)
<div class="container-fluid py-5" id="berita">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-5">Berita Terbaru</h1>
        </div>

        <div class="row g-4">
            @foreach($berita as $b)
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-2 border-primary">
                    <img src="{{ asset('storage/berita/'.$b->berita_foto) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$b->berita_title}}</h4>
                        <p class="card-text">{{ Str::limit(strip_tags($b->berita_content), 200) }}</p>
                        <p class="card-text">Dibuat Pada : {{\Carbon\Carbon::parse($b->created_at)->locale('id')->translatedFormat('j F Y H:i')}}</p>
                        <a href="/berita/{{$b->id}}">Klik untuk lanjutkan...</a>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $berita->links() }}

            <!-- <div>
                <button class="btn btn-primary text-center">Lihat Berita Lainnya</button>
            </div> -->

        </div>
    </div>
</div>
@endif
<!-- Service End -->

<!-- Service Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-5">APBDes 2026</h1>
        </div>

        <div class="row g-5">

            <!-- Kolom 1 -->
            <div class="col-lg-4 col-md-6">
                <h4>Pelaksanaan</h4>
                <h5>Realisasi | Anggaran</h5>
                <p class="mb-0">Pendapatan Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Belanja Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Pembiayaan Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
            </div>

            <!-- Kolom 2 -->
            <div class="col-lg-4 col-md-6">
                <h4>Pendapatan</h4>
                <h5>Realisasi | Anggaran</h5>
                <p>Rp.0 | Rp. 100.000.000</p>
                <p class="mb-0">Hasil Usaha Desa</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Lain Lain Hasil Usaha Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Dana Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bagi Hasil Pajak dan Retribusi Daerah</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Alokasi Dana Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bantuan Keuangan Khusus Provinsi</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bantuan Keuangan Khusus Kabupaten</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bunga Bank</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
            </div>

            <!-- Kolom 3 -->
            <div class="col-lg-4 col-md-6">
                <h4>Pembelanjaan</h4>
                <h5>Realisasi | Anggaran</h5>
                <p class="mb-0">Bidang Penyelenggaraan Pemerintahan Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bidang Pelaksanaan Pembangunan Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bidang Pembinaan Kemasyarakatan Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bidang Pemberdayaan Masyarakat Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
                <p class="mb-0">Bidang Penanggulangan Bencana, Keadaan Darurat dan Mendesak Desa</p>
                <p>Rp.0 | Rp. 100.000.000</p>
                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="progress w-100 me-3 ht-5">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="text-muted">54%</span>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Newsletter End -->

@endsection