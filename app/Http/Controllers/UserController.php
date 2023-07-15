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
use Illuminate\Support\Facades\File;


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

        $full_path = 'assets/img/' . $user_id . '.jpg';

        return view('profile', ['datas' => $datas, 'full_path' => $full_path]);
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
        $file = $request->file('profile_img');

        if ($file) {
            if ($file->extension() != 'jpg') {
                $status = false;
                Session::flash('error', 'File yang diunggah harus dalam format JPG');
                return redirect(route('profile'));
            }

            $nama_file = $username . '.jpg';
            $path = 'assets/img';
            $full_path = 'assets/img/' . $username . '.jpg';

            if (File::exists($full_path)) {

                if (File::delete($full_path)) {
                    // Session::flash('success', 'Gambar ditemukan dan berhasil dihapus!');
                    // return redirect(route('profile'));
                }
            }

            $file->move($path, $nama_file);
        }

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
