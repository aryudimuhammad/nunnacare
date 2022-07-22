@extends('layouts.front.core')
@section('title')
Pembayaran
@endsection
@section('head')
<style>
        .logo {
            margin-top: 15px;
            float: left;
            margin-right: -5px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }

        .judul {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 66%;
        }

        td,
        th {
            padding-left: 5px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .sizeimg {
            width: 60px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 12%;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 19px;
            padding: 0px;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }

        br {
            margin-bottom: 5px !important;
        }

        h5 {
            line-height: 0.3;
        }
</style>
@endsection
@section('content')
    <div class="wrap py-5">
        <div class="container-lg">

        @if ($data1->status == 2)
            <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">

                    <h2>Pembayaran</h2>

                    <div class="callout callout-info pl-3 py-0 mb-3 border-top-0 border-right-0 border-bottom-0">

                    <small class="my-2">
                        <i class="fa fa-chevron-right"></i> Total yang harus Anda bayarkan</small>

                    <div id="tagihan-list">


                    <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <strong class="text-blue-dark">Notransaksi</strong> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <strong style="margin-left: 250px;" class="text-nowrap text-secondary">#{{$data1->notransaksi}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <strong class="text-blue-dark">Harga Ongkir</strong> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <strong style="margin-left: 250px;" class="text-nowrap text-secondary">Rp. {{number_format($data1->ongkir, 0, ',', '.') }},-</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <strong class="text-blue-dark">Total Harga Produk</strong> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <strong style="margin-left: 250px;" class="text-nowrap text-secondary">Rp. {{$data2->sum('harga')}},-</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <strong class="text-blue-dark">Total Pembayaran</strong> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <strong style="margin-left: 250px;" class="text-nowrap text-secondary">Rp. {{number_format($data1->ongkir + $data2->sum('harga'), 0, ',', '.') }},-</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <strong class="text-blue-dark">Metode Pembayaran</strong> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <strong style="margin-left: 250px;" class="text-nowrap text-secondary">{{$data1->metode_pembayaran}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <strong class="text-blue-dark">Bukti Pembayaran</strong> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <strong style="margin-left: 250px;" class="text-nowrap text-secondary"> <input type="file" id="bukti" class="custom-file-input  @error ('bukti') is-invalid @enderror" name="bukti" value="{{old('bukti')}}" required></strong>
                                        <input type="text" value="{{$data1->id}}" hidden name="id">
                                        @foreach ($data2 as $d)
                                        <input type="text" value="{{$d->produk_id}}" hidden name="produk_id">
                                        <input type="text" value="{{$d->jumlah_produk}}" hidden name="jumlah">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    <button class="btn btn-sm btn-primary" type="submit" style="float:right;">Lakukan Pembayaran</button>
                    </form>
                    </div>


                    Keterangan:
                    <ul class="my-0">
                        <li class="list-item">
                            <small>Foto/Screenshot Bukti Pembayaran dan upload file bukti pembayaran.</small>
                        </li>
                        <li class="list-item">
                            <small>Jika Selesai melakukan pembayaran, admin akan segera memproses pengiriman barang.</small>
                        </li>
                        <li class="list-item">
                            <small>Apabila Barang rusak karena proses pengiriman diluar tanggung jawab kami.</small>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        @elseif ($data1->status == 1)
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Silahkan Tunggu Verifikasi Dari Admin untuk melakukan <a style="text-decoration: none;" href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}">Pembayaran</a>.</h5>
                </div>
        </div>
        @elseif ($data1->status == 3)
<div class="header">
    <div class="logo">
        <img class="sizeimg" src="{{url('logo/logoputih.png')}}">
    </div>
    <div class="headtext">
        <h3 style="margin-bottom:15px;">Nota Penjualan</h3>
        <h5 style="margin-bottom:15px;">Nunnacare Penjualan Dan Pemesanan Skincare dan Kosmetik</h5>
        <p style="margin:0px;">Jl. Guntung Harapan
        </p>
    </div>
</div>
<hr>

<div class="container" style="margin-top:10px;">
      <table class='nowrap'>
        <tbody>
          <tr>
            <td>Nama  </td>
            <td> :</td>
            <td> {{Auth()->user()->name}}</td>
          </tr>
          <tr>
            <td>Alamat </td>
            <td> : </td>
            <td> {{Auth()->user()->alamat}}</td>
          </tr>
          <tr>
            <td>Nomor Telepon </td>
            <td> : </td>
            <td> {{Auth()->user()->telepon}}</td>
          </tr>
          <tr>
            <td>Produk </td>
            <td> : </td>
            <td> @foreach ($data2 as $d)
                {{$d->produk->nama_barang}}.
            @endforeach</td>
          </tr>
          <tr>
            <td>Jumlah </td>
            <td> : </td>
            <td> @foreach ($data2 as $d)
            {{$d->produk->nama_barang}} : {{$d->jumlah_produk}} ,
            @endforeach</td>
          </tr>
          <tr>
            <td>Harga </td>
            <td> : </td>
            <td> @foreach ($data2 as $d)
                {{$d->produk->nama_barang}} : Rp.{{number_format($d->produk->harga, 0, ',', '.') }} .
            @endforeach</td>
          </tr>
          <tr>
            <td>Jenis Produk </td>
            <td> : </td>
            <td> @foreach ($data2 as $d)
            {{$d->produk->nama_barang}} : {{$d->produk->kategori->nama_kategori}} .
            @endforeach</td>
          </tr>
          <tr>
            <td>Metode Pembayaran </td>
            <td> : </td>
            <td> {{$data1->metode_pembayaran}}</td>
          </tr>
          <tr>
            <td>Estimasi </td>
            <td> : </td>
            @if ($data1->estimasi == null)
            <td> Menunggu Barang Diserahkan Ke Kurir</td>
            @else
            <td> {{$data1->estimasi}}</td>
            @endif
          </tr>
        </tbody>
      </table>
      <br>
      <div id="notices">
        <div class="notice"><b>Note :</b><small> Apabila Barang Rusak Karena Proses Pengiriman diluar tanggung jawab kami.</small></div>
      </div>
</div>
<form method="get" action="{{route('nota')}}">
    <input type="text" value="{{$data1->notransaksi}}" hidden name="notransaksi">
<button type="submit" class="btn btn-primary" style="float:right;">Cetak</button>
</form>

        @elseif ($data->status == 4)
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Barang Anda Sedang Dikirim Oleh Kurir.</h5>
                    <small>Estimasi Pengiriman {{$data->estimasi}}.</small> <br>
                    <small>Note : Apabila barang rusak karena pengiriman diluar tanggung jawab kami.</small> <br> <br>
                    <form action="" method="POST">
                    {{method_field('PUT')}}
                    @csrf
                    <input type="text" id="notransaksi" name="notransaksi" value="{{$data->notransaksi}}">
                    <small>Click Disini Jika Pesanan Sudah Diterima</small> <br><button type="submit" class="btn btn-primary">Diterima</button>
                    </form>
                </div>
        </div>
        @else
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Silahkan Tunggu Verifikasi Dari Admin untuk melakukan <a style="text-decoration: none;" href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}">Pembayaran</a>.</h5>
                </div>
        </div>
        @endif
    </div>
@endsection
