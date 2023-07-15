<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Auth extends Model
{

    public function get_user($username)
    {
        $user = DB::table('users')->where('username', $username)->first();

        return $user;

        //$data = DB::table('tga')->insert($data_tga);
    }

    public function insert_user($username, $nama, $email, $password)
    {

        $hashing_password = Hash::make($password);

        $data_user = array(
            'username' => $username,
            'role' => 2,
            'nama' => $nama,
            'email' => $email,
            'password' => $hashing_password,
        );

        $insert = DB::table('users')->insert($data_user);

        return $insert;
    }
}
