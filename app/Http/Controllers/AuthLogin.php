<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AuthLogin extends Controller
{
    public function index() {
        return view('login');
    }

    public function verif(Request $request) {
        $this->validate($request, [
            'nik' => 'required',
            'password' => 'required'
        ]);

        $data = array(
            "nik"     => $request->input('nik'),
            "password"  => $request->input('password'),
          );

        if (Auth::attempt($data)) {
            Alert::success('Success', 'Login Berhasil');
            return redirect('/dashboard');
        } else {
            Alert::error('Gagal', 'Username Atau Password Salah');
            return redirect('/login');
        }
    }

    public function register() {
        $id = DB::table('users')->select(DB::raw('RIGHT (users.id_user,3) AS kode','FALSE'))
                                ->orderBy('id_user','DESC')
                                ->limit(1)->get();
        if ($id->count()<>0) {
            $kode = intval($id[0]->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
        $rand = rand(64,10);
        $kodejadi = "USER-".$rand.$kodemax;

        $model              = new User();
        $model->id_user     = $kodejadi;
        $model->name        = 'Demo Akun';
        $model->email       = 'oneject@administrator.com';
        $model->nik         = '11223344';
        $model->section         = 'Production';
        $model->rule         = 'admin';
        $model->password    = bcrypt('oneject');
        $model->save();
            Alert::success('Success', 'Registrasi Berhasil ! Silahkan Login');
            return redirect('/login');
    }
}
