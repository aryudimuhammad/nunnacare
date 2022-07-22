
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Customer</title>
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
            width: 100%;
        }

        td,
        th {
            border: 1px solid;
            padding-left: 5px;
            text-align: center;
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
            margin-top: 20%;
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
            <h1 style="margin:0px;">Data Customer </h1>
            <h2 style="margin:0px;">Nunnacare Penjualan Dan Pemesanan Skincare dan Kosmetik</h2>
            <h4 style="margin:0px;">Jl. Guntung Harapan
            </h4>
        </div>
        <hr>
    </div>

    <div class="container" style="margin-top:10px;">
        <h3 style="text-align:center;text-transform: uppercase;">Laporan Data Customer {{$data->name}}</h3>
        <table class='table table-bordered nowrap'>
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Produk</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Jumlah</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data1 as $d)
                <tr>
                    <td scope="col" class="text-center">{{$loop->iteration}}</td>
                    <td>{{$d->produk->nama_barang}}</td>
                    <td>{{$d->produk->kategori->nama_kategori}}</td>
                    <td>{{$d->jumlah_produk}} Qty</td>
                    <td>Rp. {{number_format($d->produk->harga)}},-</td>
                    <td>Rp. {{number_format($d->produk->harga * $d->jumlah_produk, 0, ',', '.') }},-</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Total</td>
                    <td>Rp. {{$data1->sum('harga')}},-</td>
                </tr>
            </tfoot>
        </table>
        <br>
        <br>
        <!-- <div class="ttd">
            <h5>
                Banjarbaru,
            </h5>
            <h5>isi jabatan</h5>
            <br>
            <br>
            <h5 style="text-decoration:underline;">nama pejabat</h5>
            <h5>golongan / kode golongan</h5>
            <h5>NIP.</h5>
        </div> -->
    </div>
</body>

</html>
