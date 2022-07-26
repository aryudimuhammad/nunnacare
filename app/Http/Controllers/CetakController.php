<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;

class CetakController extends Controller
{
    public function nota(Request $request)
    {
    	$data = Pesanan::where('notransaksi',$request->notransaksi)->first();
    	$data1 = Pesanan_detail::where('notransaksi',$request->notransaksi)->get();


        $pdf = PDF::loadview('cetak.nota', compact('data','data1'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-nota-pdf');
    }

    public function usercetak(Request $request)
    {
    	$data = User::orderby('id','asc')->get();


        $pdf = PDF::loadview('cetak.customer', compact('data'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-user-pdf');
    }
    public function usercetak1($id)
    {
    	$data = User::where('id',$id)->first();
    	$data1 = Pesanan_detail::orderby('id','asc')->where('user_id',$id)->where('status', 2)->get();
        if(!empty($data)){
        $data1->map(function($item){
            $harga = $item->produk->harga;
            $jumlah = $item->jumlah_produk;

            $item['harga'] = $harga * $jumlah;

            return $item;
        });
    }

        $pdf = PDF::loadview('cetak.customer1', compact('data','data1'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-user-pdf');
    }
    public function cetaksupplier(Request $request)
    {
        $data = Supplier::orderby('id','asc')->get();


        $pdf = PDF::loadview('cetak.supplier', compact('data'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-supplier-pdf');
    }
    public function cetaksupplier1(Request $request, $id)
    {
        $supplier = Supplier::where('id',$id)->first();
        $data = Produk::where('supplier_id',$id)->get();


        $pdf = PDF::loadview('cetak.supplier1', compact('data','supplier'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-supplier-pdf');
    }

    public function cetakproduk()
    {
        $data = Produk::orderby('id','desc')->get();


        $pdf = PDF::loadview('cetak.produk', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-produk-pdf');
    }

    public function cetakpesanankiriman()
    {
        $data = Pesanan::join('pesanan_details','pesanans.notransaksi', '=' , 'pesanan_details.notransaksi')
                        ->join('produks','pesanan_details.produk_id','=','produks.id')
                        ->join('users','pesanans.user_id','=','users.id')
                        ->select('produks.nama_barang','users.name','users.telepon','users.alamat','pesanan_details.jumlah_produk','pesanans.notransaksi','pesanans.metode_pembayaran','pesanans.jadwal_pengiriman','pesanans.estimasi')
                        ->orderBy('pesanans.id','desc')->where('pesanans.status', 4)
                        ->get();



        $pdf = PDF::loadview('cetak.terkirim', compact('data',));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-pesanan-pdf');
    }

    public function cetakpesananditerima()
    {

        $data = Pesanan::join('pesanan_details','pesanans.notransaksi', '=' , 'pesanan_details.notransaksi')
                        ->join('produks','pesanan_details.produk_id','=','produks.id')
                        ->join('users','pesanans.user_id','=','users.id')
                        ->select('pesanans.status','produks.nama_barang','users.name','users.telepon','users.alamat','pesanan_details.jumlah_produk','pesanans.notransaksi','pesanans.metode_pembayaran','pesanans.jadwal_pengiriman','pesanans.estimasi')
                        ->orderBy('pesanans.id','desc')->where('pesanans.status', 5)
                        ->get();



        $pdf = PDF::loadview('cetak.diterima', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-pesanan-pdf');
    }

    public function cetakbaranglaris()
    {

        $data = Pesanan::join('pesanan_details','pesanans.notransaksi', '=' , 'pesanan_details.notransaksi')
                        ->join('produks','pesanan_details.produk_id','=','produks.id')
                        ->join('kategoris','produks.kategori_id','=','kategoris.id')
                        ->select('produks.nama_barang','pesanan_details.jumlah_produk','pesanans.notransaksi','kategoris.nama_kategori','pesanans.updated_at','produks.harga')
                        ->orderBy('pesanans.id','desc')->where('pesanans.status', 5)->where('pesanan_details.jumlah_produk','>=', 2)
                        ->get();



        $pdf = PDF::loadview('cetak.laris', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-pesanan-pdf');
    }

    public function cetakbarangtidaklaris()
    {

        $data = Pesanan::join('pesanan_details','pesanans.notransaksi', '=' , 'pesanan_details.notransaksi')
                        ->join('produks','pesanan_details.produk_id','=','produks.id')
                        ->join('kategoris','produks.kategori_id','=','kategoris.id')
                        ->select('produks.nama_barang','pesanan_details.jumlah_produk','pesanans.notransaksi','kategoris.nama_kategori','pesanans.updated_at','produks.harga')
                        ->orderBy('pesanans.id','desc')->where('pesanans.status', 5)->where('pesanan_details.jumlah_produk','<=', 2)
                        ->get();



        $pdf = PDF::loadview('cetak.tidaklaris', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-pesanan-pdf');
    }

    public function cetakbarangtransaksi()
    {
        $data = Pesanan::join('pesanan_details','pesanans.notransaksi', '=' , 'pesanan_details.notransaksi')
                        ->join('produks','pesanan_details.produk_id','=','produks.id')
                        ->join('users','pesanan_details.user_id','=','users.id')
                        ->select('produks.nama_barang','pesanans.metode_pembayaran','pesanans.jadwal_pengiriman','pesanan_details.jumlah_produk','pesanans.notransaksi','pesanans.updated_at','users.name','users.alamat','users.telepon')
                        ->orderBy('pesanans.id','desc')->where('pesanans.status', 5)
                        ->get();

        $pdf = PDF::loadview('cetak.transaksi', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-pesanan-pdf');
    }
    public function cetakkeuangan(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $data = Pesanan_detail::join('produks','produks.id','=','pesanan_details.produk_id')->wherenotnull('pesanan_details.produk_id')->whereBetween('pesanan_details.created_at',[$start,$end])->whereBetween('pesanan_details.updated_at',[$start,$end])->whereBetween('produks.created_at',[$start,$end])->get();

        $pdf = PDF::loadview('cetak.keuangan', compact('data','start','end'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-user-pdf');
        // return view('cetak.keuangan',compact('data'));
    }


    public function cetakcart($id,$idu)
    {
        $data = User::where('id',$idu)->first();
        $data1 = Pesanan_detail::orderBy('id','asc')->where('notransaksi',$id)->where('status',1)->get();

        $pdf = PDF::loadview('cetak.cart', compact('data','data1'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-user-pdf');
    }
}
