<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function cart(Request $request, $id)
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $data = Produk::where('id', $request->produk_id)->first();
        $date = Carbon::now()->format('mdhis');


        $result = Pesanan_detail::where('produk_id', $request->produk_id)->where('user_id', $id)->whereNull('status')->first();
        if (empty($result)) {
            $result = new Pesanan_detail();
            $result->produk_id = $request->produk_id;
            $result->user_id = $request->user_id;
            $result->jumlah_produk = 1;
            $result->save();
        } else{
            if($result->notransaksi == null && $result->status == null){
                $result = Pesanan_detail::where('produk_id', $request->produk_id)->where('user_id', $id)->whereNull('status')->whereNull('notransaksi')->first();
                $result->jumlah_produk = $result->jumlah_produk + 1;
                $result->update();
                }
            elseif($result->notransaksi == !null && $result->status == !null){
                $result = new Pesanan_detail();
                $result->produk_id = $request->produk_id;
                $result->user_id = $request->user_id;
                $result->jumlah_produk = 1;
                $result->save();
            }
        }

        $data1 = Pesanan_detail::where('user_id', $id)->whereNull('notransaksi')->get();
        $data1->map(function($item){
            $harga = $item->produk->harga;
            $jumlah = $item->jumlah_produk;

            $item['harga'] = $harga * $jumlah;

            return $item;
        });

        $data2 = Pesanan_detail::where('user_id', $id)->whereNull('notransaksi')->first();

        return view('welcome.cart', compact('data','kategori','result','data1','data2','date'));
    }

    public function cartjumlah(Request $request , $id)
    {
        $data = Pesanan_detail::where('user_id' , $id)->where('produk_id', $request->id)->first();
        if($request->jumlah < $data->produk->stok){
        $data->jumlah_produk = $request->jumlah;
        $data->update();

        return back()->with('success', 'Jumlah Produk Berhasil Diubah');
        }else{
        return back()->with('warning', 'Jumlah Produk Melebihi Stok');
        }
    }

    public function cartdelete(Request $request,$id)
    {
        $data = Pesanan_detail::where('id', $request->id)->first();
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function pembayaranlist(Request $request , $id)
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $data = Pesanan::orderby('id', 'desc')->where('status' , '<' , 5)->where('user_id', Auth()->user()->id)->get();

        return view('welcome.pembayaranlist', compact('data','kategori'));
    }

    public function pembayaran(Request $request, $id ,$idn){
        $kategori = Kategori::orderBy('id', 'desc')->get();

        $data1 = Pesanan::where('notransaksi', $idn)->first();
        $data2 = Pesanan_detail::where('notransaksi', $idn)->get();
        $data2->map(function($item){
            $harga = $item->produk->harga;
            $jumlah = $item->jumlah_produk;

            $item['harga'] = $harga * $jumlah;

            return $item;
        });

        return view('welcome.pembayaran', compact('kategori','data1','data2'));
    }

    public function pembayaran1(Request $request, $id){
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $date = Carbon::now()->format('mdhis');

        if($request->name){
            $user = User::where('id', $id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            $user->alamat = $request->alamat;
            $user->update();

            if($request->paymentMethod){
                $notransaksi = new Pesanan();
                $notransaksi->user_id = $id;
                $notransaksi->notransaksi = $date . $id;
                $notransaksi->metode_pembayaran = $request->paymentMethod;
                $notransaksi->status = 1;
                $notransaksi->save();
            }


        }
        $detail = Pesanan_detail::where('user_id',$id)->whereNull('status')->whereNull('notransaksi')->update(['notransaksi' => $date . $id, 'status' => 1]);
        $data = Pesanan::where('notransaksi', $notransaksi->notransaksi)->first();

        return view('welcome.pembayaran1', compact('kategori','data'));
    }

    public function buktipembayaran(Request $request)
    {
        $date = Carbon::now()->format('Ymd');
        $data = Pesanan::find($request->id);
            if($request->bukti){
        $data->bukti = $request->file('bukti')->store('post-image');
        $data->status = 3;
        }
        $data->update();

        $data1 = Produk::select('id','stok')->find($request->produk_id);
        // dd($data1);
        $data1->stok = $data1->stok - $request->jumlah;
        $data1->update();
        // $dataproduk = Produk::where('id' , $request->produk_id)->get();
        // $datadetail = Pesanan_detail::where('produk_id' , $request->produk_id)->firstorfail();
        // Produk::join('Pesanan_details', 'Pesanan_details.produk_id', '=', 'Produks.id')->update(['stok' => $dataproduk->stok - $datadetail->jumlah_produk]);


        return back()->with('success', 'Data Berhasil Dikirim');
    }
    public function diterima(Request $request)
    {
        $data = Pesanan::where('notransaksi',$request->notransaksi)->first();
        $data->status = 5;
        $data->update();

        Pesanan_detail::where('notransaksi',$request->notransaksi)->where('status', 2)->update(['status' => 5]);

        return back()->with('success','Terimasih Sudah Berbelanja Ditoko Kami.');
    }









    public function adminpesanandelete($id)
    {
        $data = Pesanan::where('id', $id)->first();
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function adminpesanan()
    {
        $data = Pesanan::orderBy('status','asc')->get();

        return view('admin.pesanan', compact('data'));
    }

    public function adminpesanandetail($id,$idu)
    {
        $data = User::where('id',$idu)->first();
        $data1 = Pesanan_detail::orderBy('id','asc')->where('notransaksi',$id)->where('status',1)->get();

        return view('admin.pesanandetail', compact('data','data1'));
    }

    public function ongkiradminpesanan(Request $request)
    {
        $data = Pesanan::where('id', $request->id)->first();
        $data->ongkir = $request->ongkir;
        $data->status = 2;
        $data->update();

        return back()->with('success', 'Ongkir Telah Ditambahkan');
    }

    public function estimasiadminpesanan(Request $request)
    {
        $date = Carbon::now()->format('Y-m-d');

        $data = Pesanan::find($request->id);
        $data->estimasi = $request->estimasi;
        $data->jadwal_pengiriman = $date;
        $data->status = 4;
        $data->update();

        return back()->with('success','Data Berhasil Disimpan.');
    }
}
