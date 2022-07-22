<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ProdukController extends Controller
{
    public function welcome(Request $request)
    {
        $carousel = Produk::orderBy('id', 'desc')->paginate(3);
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $produk = Produk::orderBy('id', 'desc')->paginate(9)->withQueryString();
        if ($request->kategori) {
            $produk = Produk::where('kategori_id', 'LIKE', '%' . $request->kategori . '%')->paginate();
        }
        if ($request->search) {
            $produk = Produk::where('nama_barang', 'LIKE', '%' . $request->search . '%')->paginate();

        }
        return view('welcome', compact('produk','carousel','kategori'));
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function produk(Request $request)
    {
        $produk = Produk::orderBy('id', 'desc')->get();
        $supplier = Supplier::orderby('id','desc')->get();
        $kategori = Kategori::orderby('id','desc')->get();

        return view('admin.produk', compact('produk','supplier','kategori'));
    }

    public function tambahproduk(Request $request){
        $data = new Produk();
        $data->nama_barang = $request->nama;
        $data->kategori_id = $request->kategori;
        $data->supplier_id = $request->supplier;
        $data->harga = $request->harga;
        $data->masa_berlaku = $request->berlaku;
        $data->stok = $request->stok;
        $data->keterangan = $request->keterangan;
        // if ($request->gambar) {
        //     $img = $request->file('gambar');
        //     $FotoExt = $img->getClientOriginalExtension();
        //     $FotoName = $date . $request->nama;
        //     $gambar = $FotoName . '.' . $FotoExt;
        //     $img->move('produk/', $gambar);
        //     $data->gambar = $gambar;
        // }
        $data->gambar = $request->file('gambar')->store('post-image');
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }

    public function editproduk(Request $request){
        $data = Produk::find($request->id);
        $data->nama_barang = $request->nama;
        $data->kategori_id = $request->kategori;
        $data->supplier_id = $request->supplier;
        $data->harga = $request->harga;
        $data->masa_berlaku = $request->berlaku;
        $data->stok = $request->stok;
        $data->keterangan = $request->keterangan;
        if($request->gambar){
        $data->gambar = $request->file('gambar')->store('post-image');
        }
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function detailproduk($id)
    {
        $data = Produk::where('id', $id)->first();

        return view('admin.produkdetail', compact('data'));
    }

    public function deleteproduk($id)
    {
        $data = produk::where('id', $id)->first();
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function detail(Request $request, $id)
    {
        $carousel = Produk::orderBy('id', 'desc')->paginate(3);
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $produk = Produk::orderBy('id', 'desc')->paginate(9)->withQueryString();
        if ($request->kategori) {
            $produk = Produk::where('kategori_id', 'LIKE', '%' . $request->kategori . '%')->paginate();
        }
        if ($request->search) {
            $produk = Produk::where('nama_barang', 'LIKE', '%' . $request->search . '%')->paginate();

        }
        $data = Produk::where('id', $id)->first();

        return view('welcome.detail', compact('data','carousel','kategori'));
    }
}
