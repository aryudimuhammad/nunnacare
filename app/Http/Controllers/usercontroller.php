<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function user()
    {
        $data = User::orderBy('id', 'desc')->get();

        return view('admin.user',compact('data'));
    }

    public function usertambah(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->telepon = $request->telepon;
        $data->password = $request->password;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }

    public function useredit(Request $request)
    {
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->update();

        return back()->with('success','Data Berhasil Dibuah.');
    }

    public function userdelete($id)
    {
        $data = USer::where('id', $id)->first();
        $data->delete();

        return back()->with('success','Data Berhasil Dihapus.');
    }
}
