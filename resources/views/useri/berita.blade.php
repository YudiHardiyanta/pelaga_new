@extends('useri.user')

@section('title', 'Dashboard')

@section('content')

 <!-- Hero Start -->
    <div class="container-fluid pb-5 bg-primary hero-header">
        <div class="container py-5">
            <div class="row g-3 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-1 mb-0 animated slideInLeft">Berita Terbaru</h1>
                </div>
                <div class="col-lg-6 animated slideInRight">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-end mb-0">
                            <li class="breadcrumb-item"><a class="text-primary" href="#!">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-primary" href="#!">Pages</a></li>
                            <li class="breadcrumb-item text-secondary active" aria-current="page">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

        <!-- Service Start -->
   <div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-5">Berita Terbaru</h1>
        </div>

        <div class="row g-4">
            @foreach ($berita as $b)
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-2 ">                    
                    <div class="card-body">                        
                        <img src="{{ asset('storage/berita/'.$b->berita_foto) }}" class="card-img-top" alt="">
                        <h4 class="card-title">{{$b->berita_title}}</h4>
                        <p class="card-text">
                            {!! \Illuminate\Support\Str::limit($b->berita_content, 100, '...') !!}
                        </p>
                        <a href="{{ route('berita.show', $b->id) }}">Lanjutkan...</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div>
                <button class="btn btn-primary text-center">Lihat Berita Lainnya</button>
            </div>

        </div>
    </div>
</div>
    <!-- Service End -->


@endsection