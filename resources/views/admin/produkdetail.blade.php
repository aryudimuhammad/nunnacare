@extends('layouts.back.core')
@section('tittle') Produk @endsection
@section('head')
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<section class="content">
            <div class="card">
              <div class="card-header">
                 <a style="float: right;" href="{{route('produk')}}" class="btn btn-danger btn-sm">Kembali</a>
              </div>
            </div>
</section>
<section class="py-5 text-center container">
      <div class="container-fluid">
            <div class="card">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none">{{$data->nama_barang}}</h3>
        <div class="col-12">
          <img src="{{asset('storage/' . $data->gambar)}}" class="product-image" alt="Product Image">
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">{{$data->nama_barang}}</h3>
        <h5>Supllier : {{$data->supplier->nama}}</h5>
        <h5>Kategori : {{$data->kategori->nama_kategori}}</h5>
        <h5>Masa Berlaku : {{$data->masa_berlaku}}</h5>
        <h5>Stok : {{$data->stok}}</h5>
        <hr>

        <p>{{$data->keterangan}}</p>

        <div class="py-2 px-3 mt-4">
          <h2 class="mb-0">
          Rp. {{number_format($data->harga, 0, ',', '.') }},-
          </h2>
        </div>

        <div class="mt-4">
                <input type="text" hidden name="produk_id" value="{{$data->id}}">
                <input type="text" hidden name="user_id" value="{{ Auth()->user()->id}}">
        </div>

      </div>
    </div>
  <!-- /.card-body -->
            </div>
      </div>
</section>
</div>
@endsection
@section('script')
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
@endsection
