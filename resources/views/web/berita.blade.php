<div class="row g-4">
    @foreach($berita as $b)
    <!-- Card 1 -->
    <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-2 border-primary">
            <img src="{{ asset('storage/berita/'.$b->berita_foto) }}" class="card-img-top" alt="">
            <div class="card-body">
                <h4 class="card-title">{{$b->berita_title}}</h4>
                <p class="card-text">{!!$b->berita_content!!}</p>
                <a href="#">Lanjutkan...</a>
            </div>
        </div>
    </div>
    @endforeach
    <div>
        <button class="btn btn-primary text-center">Lihat Berita Lainnya</button>
    </div>

</div>