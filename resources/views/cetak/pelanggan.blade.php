<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pelanggan yang Paling Banyak Beli</title>
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
            width: 80%;
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
            <h1 style="margin:0px;">Data Pelanggan yang Paling Banyak Beli</h1>
            <h2 style="margin:0px;">Nunnacare Penjualan Dan Pemesanan Skincare dan Kosmetik</h2>
            <h4 style="margin:0px;">Jl. Guntung Harapan
            </h4>
        </div>
        <hr>
    </div>

    <div class="container" style="margin-top:-40px;">
        <h3 style="text-align:center;text-transform: uppercase;">Laporan Data Pelanggan yang Paling Banyak Beli</h3>
        <table class='table table-bordered nowrap'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Jumlah Barang</th>
                    <th>Kuantitas Barang</th>
                    <th>Jumlah Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td scope="col" class="text-center">{{$loop->iteration}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->telepon}}</td>
                    <td>{{$d->alamat}}</td>
                    <td>{{$d->barang}} Qty</td>
                    <td>{{$d->kuantitas}} Qty</td>
                    <td>{{$d->tranksasi}} Qty</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
