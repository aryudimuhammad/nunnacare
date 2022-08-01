<?php

namespace App\Http\Controllers;

use App\Models\courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function courier()
    {
        $data = courier::orderBy('id', 'desc')->get();

        return view('admin.courier',compact('data'));
    }
    public function couriertambah(Request $request)
    {
        $data = new courier();
        $data->nama = $request->nama;
        $data->notelp = $request->notelp;
        $data->alamat = $request->alamat;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }
    public function courieredit(Request $request)
    {
        $data = courier::find($request->id);
        $data->nama = $request->nama;
        $data->notelp = $request->notelp;
        $data->alamat = $request->alamat;
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function courierdelete($id)
    {
        $data = courier::where('id', $id)->first();
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
