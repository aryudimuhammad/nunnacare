@extends('layouts.front.core')

@section('title')
Detail Produk
@endsection

@section('content')
<section class="py-5 text-center container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none">{{$data->nama_barang}}</h3>
        <div class="col-12">
          <img src="{{asset('storage/' . $data->gambar)}}" class="product-image" alt="Product Image" style="width:400px; height:400px;"  >
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">{{$data->nama_barang}}</h3>
        <small>Kategori : {{$data->kategori->nama_kategori}}</small>
        <br>
        <small>Stok : {{$data->stok}}</small>
        <br><br>
        <p>{{$data->keterangan}}</p>

        <hr>

        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
          Rp. {{number_format($data->harga, 0, ',', '.') }},-
          </h2>
        </div>

        <div class="mt-4">
            @if(Route::has('login'))
            @auth
            <form method="POST" action="{{route('cart' , ['id' => Auth()->user()->id])}}">
            @csrf
                <input type="text" hidden name="produk_id" value="{{$data->id}}">
                <input type="text" hidden name="user_id" value="{{ Auth()->user()->id}}">
                <button type="submit" class="btn btn-primary btn-lg btn-flat">Masukkan Cart</button>
            </form>
            @else
            <div class="btn btn-primary btn-lg btn-flat">
              <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-lg btn-flat">Masukkan Cart</button>
          </div>
          @endauth
        @endif
</section>


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
