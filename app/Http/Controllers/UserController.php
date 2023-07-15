<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Hash;
use Session;


class UserController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function index()
    // {
    //     return view('auth_login');
    // }


    public function profile(Request $request)
    {
        $user_model = new User();
        $user_id = session('user_id');
        $datas =  $user_model->get_user($user_id);

        return view('profile', ['datas' => $datas]);
    }

    public function profilesettings(Request $request)
    {
        $user_model = new User();
        $user_id = session('user_id');
        $datas =  $user_model->get_user($user_id);
        return view('profile_settings', ['datas' => $datas]);
    }

    function saveProfileSettings(Request $request)
    {
        $username = $request->input('username');
        $name = $request->input('name');
        $email = $request->input('email');

        $data = array(
            'nama' => $name,
            'email' => $email,
        );

        $user_model = new User();

        $update =  $user_model->update_user($username, $data);

        if ($update) {
            $status = true;
            Session::flash('success', 'Profile berhasil diedit!');
        } else {
            $status = false;
            Session::flash('error', 'Profile gagal diedit!');
        }

        return redirect(route('profile'));
    }
}
