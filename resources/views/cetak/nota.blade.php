<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Nota Penjualan</title>
    <link rel="icon" type="image/png" href="{{url('img/logo.png')}}">
    <style>
        .logo {
            margin-top: 15px;
            float: left;
            margin-right: -5px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }

        table {
            border-collapse: collapse;
            width: 66%;
        }

        td,
        th {
            padding-left: 5px;
        }

        .judul {
            text-align: center;
        }


        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        .sizeimg {
            width: 60px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
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
</head>

<body>

    <div class="header">
        <div class="logo">
            <img class="sizeimg" src="logo/logo.jpg">
        </div>
        <div class="headtext">
            <h1 style="margin:0px;">Nota Penjualan</h1>
            <h2 style="margin:0px;">Nunnacare Penjualan Dan Pemesanan Skincare dan Kosmetik</h2>
            <h4 style="margin:0px;">Jl. Guntung Harapan
            </h4>
        </div>
        <hr>
    </div>

    <div class="container" style="margin-top:10px;">
        <table class='table nowrap'>
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
            <td> @foreach ($data1 as $d)
                {{$d->produk->nama_barang}}.
            @endforeach</td>
          </tr>
          <tr>
            <td>Jumlah </td>
            <td> : </td>
            <td> @foreach ($data1 as $d)
            {{$d->produk->nama_barang}} : {{$d->jumlah_produk}} ,
            @endforeach</td>
          </tr>
          <tr>
            <td>Harga </td>
            <td> : </td>
            <td> @foreach ($data1 as $d)
                {{$d->produk->nama_barang}} : Rp.{{number_format($d->produk->harga, 0, ',', '.') }} .
            @endforeach</td>
          </tr>
          <tr>
            <td>Jenis Produk </td>
            <td> : </td>
            <td> @foreach ($data1 as $d)
            {{$d->produk->nama_barang}} : {{$d->produk->kategori->nama_kategori}} .
            @endforeach</td>
          </tr>
          <tr>
            <td>Metode Pembayaran </td>
            <td> : </td>
            <td> {{$data->metode_pembayaran}}</td>
          </tr>
          <tr>
            <td>Estimasi </td>
            <td> : </td>
            @if ($data->estimasi == null)
            <td> Menunggu Barang Diserahkan Ke Kurir</td>
            @else
            <td> {{$data->estimasi}}</td>
            @endif
          </tr>
        </tbody>
        </table>
        <br>
      <div id="notices">
        <div class="notice"><b>Note :</b><small> Apabila Barang Rusak Karena Proses Pengiriman diluar tanggung jawab kami.</small></div>
      </div>
    </div>
</body>

</html>
