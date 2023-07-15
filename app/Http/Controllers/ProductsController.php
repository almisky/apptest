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

    public function addProductsPage(Request $request)
    {
        return view('add_products');
    }

    function addProducts(Request $request)
    {
        $username = $request->input('username');
        $name = $request->input('name');
        $cc = $request->input('cc');

        $data = array(
            'products_name' => $name,
            'cc' => $cc,
            'user_input' => $username,
        );

        $products_model = new Products();

        $insert =  $products_model->insert_products($data);

        if ($insert) {
            $status = true;
            Session::flash('success', 'Product berhasil ditambah!');
        } else {
            $status = false;
            Session::flash('error', 'Product gagal ditambah!');
        }

        return redirect(route('productslist'));
    }

    public function editProductsPage($id_product)
    {
        $products_model = new Products();
        $datas =  $products_model->get_product($id_product);
        return view('edit_products', ['datas' => $datas]);
    }

    function editProducts(Request $request)
    {
        $id_products = $request->input('id_products');
        $name = $request->input('name');
        $cc = $request->input('cc');

        $data = array(
            'products_name' => $name,
            'cc' => $cc,
        );

        $products_model = new Products();

        $update =  $products_model->update_products($id_products, $data);

        if ($update) {
            $status = true;
            Session::flash('success', 'Product berhasil diedit!');
        } else {
            $status = false;
            Session::flash('error', 'Product gagal diedit!');
        }

        return redirect(route('productslist'));
    }

    public function deleteProducts($id_product)
    {
        $products_model = new Products();
        $delete =  $products_model->delete_product($id_product);

        if ($delete) {
            $status = true;
            Session::flash('success', 'Product berhasil dihapus!');
        } else {
            $status = false;
            Session::flash('error', 'Product gagal dihapus!');
        }
        return redirect(route('productslist'));
    }
}
