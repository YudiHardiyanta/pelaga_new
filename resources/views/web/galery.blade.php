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
<div class="container-fluid pb-5 bg-primary hero-header">
    <div class="container py-5">
        <div class="row g-3 align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-1 mb-0 animated slideInLeft">Galery {{$kegiatan}}</h1>
            </div>
            <div class="col-lg-6 animated slideInRight">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-end mb-0">
                        <li class="breadcrumb-item"><a class="text-primary" href="/">Beranda</a></li>
                        <li class="breadcrumb-item"><a class="text-primary" href="/#galery">Galery</a></li>
                        <li class="breadcrumb-item text-secondary active" aria-current="page">{{$kegiatan}}</li>
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
        <div class="row">
            @foreach ($galleries as $g)
            <div class="col-md-3 mb-3 wow fadeIn" data-wow-delay="0.2s">
                <div class="card">
                    <div class="project-item position-relative overflow-hidden">
                        <img class="img-fluid w-100 gallery-img" src="{{ asset('storage/galery/'.$g->image) }}" alt="">
                        <a class="project-overlay text-decoration-none" href="{{$g->kegiatan? '/galery/'.$g->kegiatan : '#'}}">
                            <h4 class="text-white">Kegiatan {{$g->kegiatan?$g->kegiatan : 'Desa Pelaga'}}</h4>
                            <small class="text-white">{{\Carbon\Carbon::parse($g->created_at)->locale('id')->translatedFormat('j F Y H:i') }}</small>
                        </a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $g->title }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
<!-- Contact End -->
@endsection