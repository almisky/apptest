<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Hash;
use Session;

class ProductsController extends BaseController
{
    public function index(Request $request)
    {
        $products_model = new Products();
        $user_id = session('user_id');
        $datas =  $products_model->get_products_list($user_id);

        $nomor = 1;

        return view('product_list', ['product' => $datas, 'nomor' => $nomor]);
    }
}
