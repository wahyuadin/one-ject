<?php

namespace App\Http\Controllers;

use App\Models\postes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class ApiGET extends Controller
{
    public function index(Request $request) {
        $response = Http::get('https://dummyjson.com/users');
        if ($response->successful()) {
            if ($request->has('search')) {
                $this->validate($request,[
                    'cari' => ''
                ]);
                $searchTerm = $request->cari;

                $response = Http::get('https://dummyjson.com/users');
                $allUsers = $response->json();

                $filteredUsers = collect($allUsers['users'])->filter(function ($user) use ($searchTerm) {
                    return  strpos(strtolower($user['firstName']), strtolower($searchTerm)) !== false ||
                            strpos(strtolower($user['lastName']), strtolower($searchTerm)) !== false ||
                            strpos(strtolower($user['email']), strtolower($searchTerm)) !== false;
                })->toArray();

                return view('api.api', ['api' => $filteredUsers]);
            }
            if ($request->has('submit')) {
                $this->validate($request,[
                    'firstName' => 'required',
                    'lastName' => 'required',
                    'email' => 'required',
                ]);
                $response = Http::post('https://dummyjson.com/users/add',$request->all());
                if ($response->successful()) {
                    // dd($response->json());
                    // return view('api', ['api' => $response->json()]);
                    return redirect('/get')->with('success', 'Data Berhasil Di input');
                }
            }
            $data = $response->json();
            // dd($data['total']);
            return view('api.api', ['api' => $data['users']]);
        } else {
            // Tangani kesalahan jika permintaan API gagal
            // Misalnya, Anda dapat mengembalikan respons kesalahan
            return response()->json(['error' => 'Permintaan API gagal'], $response->status());
        }
    }

    public function update($id) {

        $userData = Http::get("https://dummyjson.com/users/{$id}");
        return view('api.update',['api' => $userData->json()]);
    }

    public function prosesupdate(Request $request) {
        $this->validate($request,[
            'id'            => 'required',
            'firstName'     => 'required',
            'lastName'      => 'required',
            'email'         => 'required',
        ]);

        $response = Http::put("https://dummyjson.com/users/{$request->id}", $request->all());

        if ($response->successful()) {
            return redirect("/get")->with('success', 'User berhasil diupdate.');
        } else {
            return redirect("/get")->with('error', 'Gagal mengupdate user.');
        }
    }

    public function hapus($id) {
        $response = Http::delete("https://dummyjson.com/users/{$id}");

        if ($response->successful()) {
            return redirect("/get")->with('success', 'User berhasil dihapus.');
        } else {
            return redirect("/get")->with('error', 'Gagal hapus user.');
        }

    }

    public function riyandi() {
        dd(postes::where('id_user', 'USER-4601')->count());
    }

}
