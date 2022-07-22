@extends('layouts.front.core')

@section('title')
Home
@endsection

@section('content')
<section class="py-5 text-center container">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            @foreach($carousel as $d)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} data-bs-interval="
                    10000">
                    <img src="{{asset('storage/' . $d->gambar)}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $d->nama_barang }}</h5>
                        <p>{{ $d->keterangan }}</p>
                    </div>
                </div>
            @endforeach

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
</section>

<!---- batas ----->

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($produk as $d)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{asset('storage/' . $d->gambar)}}" alt="gambar">
                        <div class="card-body">
                            <h1>{{ $d->nama_barang }}</h1>
                            <p class="card-text">{{$d->keterangan}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Rp. {{number_format($d->harga, 0, ',', '.') }},-</small>
                                <div class="btn-group">
                                    @if(Route::has('login'))
                                    @auth
                                    <form method="POST" action="{{route('cart' , ['id' => Auth()->user()->id])}}">
                                        @csrf
                                        <input type="text" hidden name="produk_id" value="{{$d->id}}">
                                        <input type="text" hidden name="user_id" value="{{ Auth()->user()->id}}">

                                        <a type="button" href="{{route('detail' , ['id' => $d->id])}}" class="btn btn-sm btn-outline-secondary">Detail</a>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Tambahkan Cart</button>
                                    </form>
                                    @else
                                    <a type="button" href="{{route('detail' , ['id' => $d->id])}}" class="btn btn-sm btn-outline-secondary">Detail</a>
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Cart</button>
                                    @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <br><br>
        <div class="d-flex justify-content-center">
            {{ $produk->links() }}
        </div>
    </div>
</div>



<!-- close login -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
            <div class="swal2-header">
                <ul class="swal2-progress-steps" style="display: none;"></ul>
                <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                        <span class="swal2-x-mark-line-left"></span>
                        <span class="swal2-x-mark-line-right"></span>
                    </span>
                </div>
                <div class="swal2-icon swal2-question" style="display: none;"></div>
                <div class="swal2-icon swal2-warning" style="display: none;"></div>
                <div class="swal2-icon swal2-info" style="display: none;"></div>
                <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;">
                <h2 class="swal2-title" id="swal2-title" style="margin-left: 10px;">Silahkan Login Terlebih Dahulu.</h2>
                <div class="swal2-actions"><button type="button" class="swal2-confirm swal2-styled btn-danger" aria-label="" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Close</button></div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
