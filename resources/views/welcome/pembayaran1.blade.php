@extends('layouts.front.core')
@section('title')
Pembayaran
@endsection
@section('content')
    <div class="wrap py-5">
        <div class="container-lg">
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Silahkan Tunggu Verifikasi Dari Admin untuk melakukan <a style="text-decoration: none;" href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}">Pembayaran</a>.</h5>
                </div>
        </div>
    </div>
@endsection
