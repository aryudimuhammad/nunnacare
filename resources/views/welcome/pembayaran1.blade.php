@extends('layouts.front.core')
@section('title')
Pembayaran
@endsection
@section('content')

@if ($data->user_id == Auth()->user()->id && $data->metode_pembayaran == 'COD')
<div class="wrap py-5">
        <div class="container-lg">
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Silahkan Tunggu Verifikasi Dari Admin untuk melakukan <a style="text-decoration: none;" href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}">Sistem COD</a>.</h5>
                </div>
        </div>
</div>
@else
<div class="wrap py-5">
        <div class="container-lg">
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Silahkan Tunggu Verifikasi Dari Admin untuk melakukan <a style="text-decoration: none;" href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}">Pembayaran</a>.</h5>
                </div>
        </div>
</div>
@endif

@endsection
