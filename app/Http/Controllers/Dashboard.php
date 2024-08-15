<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\postes;
use App\Models\pretes;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class Dashboard extends Controller
{
    public function index(Request $request) {
        if ($request->has('pdf')) {
            $data = PDF::loadview('pdf',['pdf'=> Event::all()])->setPaper('a4')->save('pdf/'.rand(1,488).'_data.pdf');
            return $data->stream('download.pdf');
        }
        return view('dashboard',[
            'data'      => Event::all(),
            'postes'    => postes::count(),
            'pretes'    => pretes::count(),
            'user'      => User::count(),
            'kalender'  => Event::count()
        ]);
    }

    public function logout() {
        Alert::success('Success', 'logout Berhasil !');
        Auth::logout();
        return redirect('/login');
    }

}
