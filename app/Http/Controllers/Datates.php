<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\postes;
use App\Models\pretes;
use Illuminate\Http\Request;

class Datates extends Controller
{
    public function pretes(Request $request) {
        if($request->has('filter')){
            $this->validate($request,[
                "kategori"  => 'required'
            ]);
            $filter = pretes::where('kategori','LIKE','%'.$request->kategori.'%')->get();
            return view('pretes',['data' => $filter , "kategori" => Kategori::all()]);
        }
        return view('pretes',["data" => pretes::all(),"kategori" => Kategori::all()]);
    }

    public function postes(Request $request) {
        if($request->has('filter')){
            $this->validate($request,[
                "kategori"  => 'required'
            ]);
            $filter = postes::where('kategori','LIKE','%'.$request->kategori.'%')->get();
            return view('postes.postes',['data' => $filter , "kategori" => Kategori::all()]);
        }
        return view('postes.postes',["data" => postes::all(),"kategori" => Kategori::all()]);
    }

}


