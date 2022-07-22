<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplier()
    {
        $data = Supplier::orderBy('id', 'desc')->get();

        return view('admin.supplier',compact('data'));
    }
    public function tambahsupplier(Request $request)
    {
        $data = new Supplier();
        $data->nama = $request->nama;
        $data->telepon = $request->telepon;
        $data->alamat = $request->alamat;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }
    public function deletesupplier($id)
    {
        $data = Supplier::where('id', $id)->first();
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
    public function editsupplier(Request $request, $id)
    {
        $data = Supplier::find($id);

        return view('admin.supplieredit',compact('data'));
    }

    public function aksieditsupplier(Request $request, $id)
    {
        $data = Supplier::where('id',$request->id)->first();
            $data->nama = $request->nama;
            $data->telepon = $request->telepon;
            $data->alamat = $request->alamat;
            $data->update();
            return back()->with('success', 'Data Berhasil Diubah');

            return back()->with('success', 'Data Berhasil Diubah');
    }


    public function detailsupplier($id)
    {
        $data = Supplier::where('id',$id)->first();
        $produk = Produk::where('supplier_id',$id)->get();

        return view('admin.detailsupplier',compact('data','produk'));
    }

    public function refundsupplier(Request $request, $id)
    {
        $data = Produk::find($request->id);
        if($request->refund > $data->stok){
            return back()->with('warning','Data Tidak Boleh Lebih dari Jumlah Stok Barang.');
        } else {
            $data->stok = $data->stok - $request->refund;
            $data->refund = $request->refund;
            $data->update();

            return back()->with('success','Data Berhasil Di Refund.');
        }
    }

}
