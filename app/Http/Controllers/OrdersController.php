<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Hash;
use Session;

class OrdersController extends BaseController
{
    public function orderList(Request $request)
    {
        $orders_model = new Orders();
        $user_id = session('user_id');
        $role = session('role');
        $datas =  $orders_model->get_admin_orders_list();

        for ($i = 0; $i < sizeof($datas); $i++) {
            $detail = $orders_model->get_detail_product_by_data_order($user_id, $datas[$i]->products_id, $role);
            $datas[$i]->products_name = $detail[0]->products_name;
            $datas[$i]->cc = $detail[0]->cc;
            $datas[$i]->badge_status = $datas[$i]->status == 1 ? 'success' : 'danger';
            $datas[$i]->status = $datas[$i]->status == 1 ? 'ordered' : 'canceled';
        }

        $nomor = 1;

        return view('admin_order_list', ['orders' => $datas, 'nomor' => $nomor]);
    }

    public function myOrderList(Request $request)
    {
        $orders_model = new Orders();
        $user_id = session('user_id');
        $role = session('role');
        $datas =  $orders_model->get_user_orders_list($user_id);

        for ($i = 0; $i < sizeof($datas); $i++) {
            $detail = $orders_model->get_detail_product_by_data_order($user_id, $datas[$i]->products_id, $role);
            $datas[$i]->products_name = $detail[0]->products_name;
            $datas[$i]->cc = $detail[0]->cc;
            $datas[$i]->badge_status = $datas[$i]->status == 1 ? 'success' : 'danger';
            $datas[$i]->status = $datas[$i]->status == 1 ? 'ordered' : 'canceled';
        }

        $nomor = 1;

        return view('user_order_list', ['orders' => $datas, 'nomor' => $nomor]);
    }

    public function makeOrderPage(Request $request)
    {
        $orders_model = new Orders();
        $user_id = session('user_id');
        $datas =  $orders_model->get_products_list_for_user();

        $nomor = 1;

        return view('product_list', ['product' => $datas, 'nomor' => $nomor]);
    }

    function makeOrder($id_product)
    {
        $user_id = session('user_id');

        $data = array(
            'products_id' => $id_product,
            'id_user' => $user_id,
            'status' => 1,
        );

        $orders_model = new Orders();

        $insert =  $orders_model->insert_orders($data);

        if ($insert) {
            $status = true;
            Session::flash('success', 'Order berhasil dibuat!');
        } else {
            $status = false;
            Session::flash('error', 'Order gagal dibuat');
        }

        return redirect(route('makeorderpage'));
    }
}
