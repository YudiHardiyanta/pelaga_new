@extends('useri.user')

@section('title', 'Dashboard')

@section('content')

    <!-- Hero Start -->
    <div class="container-fluid pb-5 bg-primary hero-header">
        <div class="container py-5">
            <div class="row g-3 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-1 mb-0 animated slideInLeft">Struktur Organisasi</h1>
                </div>
                <div class="col-lg-6 animated slideInRight">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-end mb-0">
                            <li class="breadcrumb-item"><a class="text-primary" href="#!">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-primary" href="#!">Pages</a></li>
                            <li class="breadcrumb-item text-secondary active" aria-current="page">Contact</li>
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
           
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-5">SRUKTUR ORGANISASI </h1>
            </div>
            <div class="row justify-content-center">
                    <div class="text-center wow fadeIn" data-wow-delay="0.3s">
                        
                       <img src="img/pelaga_so.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
 @endsection