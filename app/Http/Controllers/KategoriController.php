<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index(Request $request) {
        if ($request->has('tambah')) {
            $this->validate($request,[
                'id_user'   => 'required',
                'nama'      => 'required|min:3|max:50|unique:kategoris,nama,',
            ]);

            $data           = new Kategori;
            $data->id_user  = $request->id_user;
            $data->nama     = $request->nama;
            if ($data->save()) {
                Alert::success('Success', 'Data Berhasil Di Tambah!');
                return redirect('/kategori');
            }
        }


        return view('kategori.kategori',["data" => Kategori::all()]);
    }

    public function edit($id) {
        return view('kategori.kategoriedit', ["data" => Kategori::where('id',$id)->get()]);
    }

    public function editsimpan(Request $request) {
        $this->validate($request, [
            "id"        => 'required',
            'id_user'   => 'required',
            'nama'      => 'required|min:3|max:50|unique:kategoris,nama',
        ]);

        Kategori::where('id', $request->id)->update([
            'nama'      => $request->nama
        ]);
        Alert::success('Success', 'Data Berhasil Di Edit!');
        return redirect('/kategori');
   }

   public function hapuskategori($id) {
    Kategori::where('id', $id)->delete();
    Alert::success('Success', 'Data Berhasil Di Hapus!');
    return redirect('/kategori');
   }
}
