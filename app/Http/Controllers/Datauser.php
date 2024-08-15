<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class Datauser extends Controller
{
    public function index() {
        return view('user.index', ["data" => User::all()]);
    }

    public function editdata($id) {
        return view('user.editdata', ["data" => User::where('id',$id)->get()]);
    }

    public function simpandata(Request $request) {
        $this->validate($request,[
            'id'        => 'required',
            'nama'      => 'required|min:3|max:50',
            'nik'       => 'required|min:5|max:50',
            'email'     => 'email|required',
            'section'   => 'required',
            'password'  => '',
            'rule'      => 'required'
        ]);

        if ($request->password) {
            $save = User::find($request->id);
            $save->name     = $request->nama;
            $save->nik      = $request->nik;
            $save->email    = $request->email;
            $save->section  = $request->section;
            $save->password = bcrypt($request->password);
            $save->rule     = $request->rule;
            if ($save->save()) {
                Alert::success('Success', 'Data Berhasil Di Simpan!');
                return redirect('/user');
            }
        } else {
            $save = User::find($request->id);
            $save->name     = $request->nama;
            $save->nik      = $request->nik;
            $save->email    = $request->email;
            $save->section  = $request->section;
            $save->rule     = $request->rule;
            if ($save->save()) {
                Alert::success('Success', 'Data Berhasil Di Simpan!');
                return redirect('/user');
            }
        }
    }

    public function hapusdata($id) {
        User::where('id',$id)->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus!');
        return redirect('/data');
    }

    public function profile(Request $request,$id_user) {
        if ($request->has('kirim')) {

            $this->validate($request, [
                'nama'          => 'required',
                'foto'          => 'file|mimes:png,jpg,jpeg',
                'sampul'        => 'file|mimes:png,jpg,jpeg',
                'email'         => 'email|required',
                'password'      => ''
            ]);
            if ($request->foto) {
                $profile = $request->file('foto');
                $profile->move('gambar',$profile->getClientOriginalName());
                User::where('id_user',$id_user)->update([
                    'email'     => $request->email,
                    'foto'      => $profile->getClientOriginalName(),
                    'name'      => $request->nama,
                    'password'  => bcrypt($request->password)
                ]);

            } elseif ($request->sampul) {
                $profile = $request->file('sampul');
                $profile->move('gambar',$profile->getClientOriginalName());
                User::where('id_user',$id_user)->update([
                    'email'     => $request->email,
                    'sampul'     => $profile->getClientOriginalName(),
                    'name'      => $request->nama,
                    'password'  => bcrypt($request->password)
                ]);

            } else {
                User::where('id_user',$id_user)->update([
                    'email'     => $request->email,
                    'name'      => $request->nama,
                    'password'  => bcrypt($request->password)
                ]);
            }
            Alert::success('Success', 'Data Berhasil Di Update!');
            return Redirect::back();
        }
        return view('profile',['user' => User::where('id_user',$id_user)]);
    }
}
