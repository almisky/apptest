<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Auth;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Hash;
use Session;


class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('auth_login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $auth_model = new Auth();

        $datas =  $auth_model->get_user($username);
        if (!$datas) {
            Session::flash('error', 'Username tidak ditemukan');
            return redirect()->back();
        }

        if (!Hash::check($password, $datas->password)) {
            Session::flash('error', 'Password Salah');
            // return redirect()->back();
            return redirect(route('loginform'));
        }

        $session_data = array(
            'user_id' => $datas->username,
            'nama' =>  $datas->nama,
            'role' =>  $datas->role,
            'email' =>  $datas->email,
        );
        Session::put($session_data);
        return redirect(route('profile'));
    }

    public function doLogout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('loginform'));
    }

    // public function HakAkses()
    // {
    //     return view('auth_login');
    // }

    public function indexRegister()
    {
        return view('auth_register');
    }

    public function doRegister(Request $request)
    {
        $username = $request->input('username');
        $nama = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $auth_model = new Auth();

        $datas =  $auth_model->get_user($username);
        if ($datas) {
            Session::flash('error', 'Username sudah ada!');
            return redirect()->back();
        }

        if (!$datas) {
            $insert_user = $auth_model->insert_user($username, $nama, $email, $password);

            if ($insert_user) {
                Session::flash('success', 'Registrasi berhasil!');
                return redirect(route('loginform'));
            } else {
                Session::flash('error', 'Registrasi gagal!');
                return redirect()->back();
            }
        }
    }
}
