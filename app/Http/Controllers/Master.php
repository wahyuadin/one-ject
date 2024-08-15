<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use App\Models\Kategori;
use App\Models\postes;
use App\Models\pretes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class Master extends Controller
{
    public function index(Request $request) {

        if ($request->has('tambah')) {
            $this->validate($request, [
                'id_user'       => 'required',
                'nama'          => 'required|min:5|max:50',
                'type_tes'      => 'required',
                'kategori'      => 'required',
                'web_address'   => 'required',
                'gambar'        => 'required|mimes:jpg,jpeg,png,gif|max:6144'
            ]);
            if ($request->type_tes == 'post') {
                $id = DB::table('postes')->select(DB::raw('RIGHT (postes.id_user,3) AS kode','FALSE'))
                        ->orderBy('id_user','DESC')->limit(1)->get();
                if ($id->count()<>0) {
                $kode = intval($id[0]->kode) + 1;
                } else {
                $kode = 1;
                }
                $kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
                $rand = rand(64,10);
                $postes = "PT-".$rand.$kodemax;
                $file = $request->file('gambar');

                $pos = new postes;
                $pos->id_tes    = $postes;
                $pos->nama      = $request->nama;
                $pos->id_user   = $request->id_user;
                $pos->kategori  = $request->kategori;
                $pos->link      = $request->web_address;
                $pos->gambar    = $file->getClientOriginalName();
                if ($pos->save()) {
                    $master = new DataMaster;
                    $master->id_user    = $request->id_user;
                    $master->id_tes     = $postes;
                    $master->nama       = $request->nama;
                    $master->tes        = "Post Test";
                    $master->kategori   = $request->kategori;
                    $master->link       = $request->web_address;
                    $master->gambar     = $file->getClientOriginalName();
                    $master->save();
                    $file->move('gambar',$file->getClientOriginalName());
                    Alert::success('Success', 'Data Berhasil Di Simpan!');
                    return redirect('/data');
                }
            } else {
                $id = DB::table('pretes')->select(DB::raw('RIGHT (pretes.id_user,3) AS kode','FALSE'))
                ->orderBy('id_user','DESC')
                ->limit(1)->get();
                if ($id->count()<>0) {
                $kode = intval($id[0]->kode) + 1;
                } else {
                $kode = 1;
                }
                $kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
                $rand = rand(64,10);
                $pretes = "PT-".$rand.$kodemax;
                $file = $request->file('gambar');
                $pos = new pretes;
                $pos->id_tes    = $pretes;
                $pos->nama      = $request->nama;
                $pos->id_user   = $request->id_user;
                $pos->kategori  = $request->kategori;
                $pos->link      = $request->web_address;
                $pos->gambar    = $file->getClientOriginalName();
                if ($pos->save()) {
                    $master = new DataMaster;
                    $master->id_tes     = $pretes;
                    $master->id_user    = $request->id_user;
                    $master->nama       = $request->nama;
                    $master->tes        = "Pre Test";
                    $master->kategori   = $request->kategori;
                    $master->link       = $request->web_address;
                    $master->gambar     = $file->getClientOriginalName();
                    $master->save();
                    $file->move('gambar',$file->getClientOriginalName());
                    Alert::success('Success', 'Data Berhasil Di Simpan!');
                    return redirect('/data');
                }
            }
        }
        return view('data',["data" => DataMaster::all(), "kategori" => Kategori::all()]);
    }

    public function editdata(Request $request,$id) {
        if ($request->has('kirim')) {
            $this->validate($request,[
                'id'        => 'required',
                'id_user'   => 'required',
                'id_tes'    => 'required',
                'nama'      => 'required',
                'kategori'  => 'required',
                'typetes'   => 'required',
                'gambar'    => 'mimes:png,jpg',
                'link'      => 'required|min:10',
            ]);
            $file = $request->file('gambar');
            if ($request->gambar) {
                // gambar
                if ($request->typetes == 'Post Test') {
                    // postes gambar
                    DB::beginTransaction();
                try {
                    DB::table('data_masters')
                        ->join('postes', 'data_masters.id_user', '=', 'postes.id_user')
                        ->where('data_masters.id_tes', $request->id_tes)
                        ->update([
                            'data_masters.nama'     => $request->nama,
                            'data_masters.kategori' => $request->kategori,
                            'data_masters.link'     => $request->link,
                            'data_masters.gambar'   => $file->getClientOriginalName(),
                            'postes.kategori'       => $request->kategori,
                            'postes.link'           => $request->link,
                            'postes.nama'           => $request->nama,
                            'postes.gambar'         => $file->getClientOriginalName()
                        ]);
                        DB::commit();
                        Alert::success('Success', 'Data Berhasil Di Update!');
                        return redirect('/data');
                    } catch (\Exception $e) {
                        DB::rollback();
                        return response()->json(['message' => 'Error updating data: ' . $e->getMessage()], 500);
                    }
                } else {
                    // postes gambar
                    // pre tes
                    DB::beginTransaction();
                try {
                    DB::table('data_masters')
                        ->join('pretes', 'data_masters.id_user', '=', 'pretes.id_user')
                        ->where('data_masters.id_tes', $request->id_tes)
                        ->update([
                            'data_masters.nama'     => $request->nama,
                            'data_masters.kategori' => $request->kategori,
                            'data_masters.link'     => $request->link,
                            'data_masters.gambar'   => $file->getClientOriginalName(),
                            'pretes.gambar'         => $file->getClientOriginalName(),
                            'pretes.kategori'       => $request->kategori,
                            'pretes.link'           => $request->link,
                            'pretes.nama'           => $request->nama,
                        ]);
                    DB::commit();
                    Alert::success('Success', 'Data Berhasil Di Update!');
                    return redirect('/data');
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['message' => 'Error updating data: ' . $e->getMessage()], 500);
                }
            }
            } else {
                // non gambar
                if ($request->typetes == "Post Test") {
                    // Pre Test
                    DB::beginTransaction();
                try {
                    DB::table('data_masters')
                        ->join('postes', 'data_masters.id_tes', '=', 'postes.id_tes')
                        ->where('data_masters.id_tes', $request->id_tes)
                        ->update([
                            'data_masters.nama'     => $request->nama,
                            'data_masters.kategori' => $request->kategori,
                            'data_masters.link'     => $request->link,
                            'postes.kategori'       => $request->kategori,
                            'postes.link'           => $request->link,
                            'postes.nama'           => $request->nama,
                        ]);
                    DB::commit();
                    Alert::success('Success', 'Data Berhasil Di Update!');
                    return redirect('/data');
                    } catch (\Exception $e) {
                        DB::rollback();
                        return response()->json(['message' => 'Error updating data: ' . $e->getMessage()], 500);
                    }
                } else {
                    // post tes
                    DB::beginTransaction();
                try {
                    DB::table('data_masters')
                        ->join('pretes', 'data_masters.id_user', '=', 'pretes.id_user')
                        ->where('data_masters.id_tes', $request->id_tes)
                        ->update([
                            'data_masters.nama'     => $request->nama,
                            'data_masters.kategori' => $request->kategori,
                            'data_masters.link'     => $request->link,
                            'pretes.kategori'       => $request->kategori,
                            'pretes.link'           => $request->link,
                            'pretes.nama'           => $request->nama,
                        ]);
                    DB::commit();
                    Alert::success('Success', 'Data Berhasil Di Update!');
                    return redirect('/data');
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['message' => 'Error updating data: ' . $e->getMessage()], 500);
                }
                }
            }
        }
        return view('postes.editdata', ["data" => DataMaster::where('id',$id)->get(), 'kategori' => Kategori::all()]);
    }

    public function hapusdata($id) {
        if (postes::where('id_tes', $id)->count() >= 1) {
            DataMaster::where('id_tes', $id)->delete();
            postes::where('id_tes', $id)->delete();
            Alert::success('Success', 'Data Berhasil Di Hapus!');
            return redirect('/data');
        } else {
            DataMaster::where('id_tes', $id)->delete();
            pretes::where('id_tes', $id)->delete();
            Alert::success('Success', 'Data Berhasil Di Hapus!');
            return redirect('/data');
        }

    }
}
