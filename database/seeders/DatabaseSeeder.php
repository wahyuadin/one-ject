<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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

        User::create([
            'id_user'       => $kodejadi,
            'name'          => 'Demo Admin',
            'email'         => 'oneject@administrator.com',
            'nik'           => '11223344',
            'section'       => 'Production',
            'rule'          => 'admin',
            'password'      => bcrypt('oneject'),
        ]);
        User::create([
            'id_user'       => $kodejadi,
            'name'          => 'Demo User',
            'email'         => 'oneject@user.com',
            'nik'           => '123456',
            'section'       => 'Production',
            'rule'          => 'user',
            'password'      => bcrypt('oneject'),
        ]);
    }
}
