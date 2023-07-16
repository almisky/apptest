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
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;
use Dompdf\FontMetrics;
use Dompdf\Options;

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

    public function cancelOrder($id_order)
    {
        $orders_model = new Orders();
        $cancel =  $orders_model->cancel_order($id_order);

        if ($cancel) {
            $status = true;
            Session::flash('success', 'Order berhasil dibatalkan!');
        } else {
            $status = false;
            Session::flash('error', 'Order gagal dibatalkan!');
        }
        return redirect(route('myorderslist'));
    }

    public function deleteOrder($id_order)
    {
        $orders_model = new Orders();
        $delete =  $orders_model->delete_order($id_order);

        if ($delete) {
            $status = true;
            Session::flash('success', 'Order berhasil dihapus!');
        } else {
            $status = false;
            Session::flash('error', 'Order gagal dihapus!');
        }
        return redirect(route('myorderslist'));
    }

    public function exportOrdersUser()
    {
        // $user_id = session('user_id');
        // return Excel::download(new OrdersExport, "$user_id orders.xlsx");

        $orders_model = new Orders();

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $user_id = session('user_id');
        $role = session('role');
        $datas =  $orders_model->get_user_orders_list_full_data($user_id);

        $activeWorksheet->setCellValue("A1", 'No.');
        $activeWorksheet->setCellValue("B1", 'Order ID');
        $activeWorksheet->setCellValue("C1", 'Products Name');
        $activeWorksheet->setCellValue("D1", 'CC');
        $activeWorksheet->setCellValue("E1", 'Status');


        // echo '<pre>' . print_r($datas) . '</pre>';
        // exit;

        for ($i = 0; $i < sizeof($datas); $i++) {
            $row = $i + 2;
            $nomor = $i + 1;

            $status = $datas[$i]->status == 1 ? 'Ordered' : 'Canceled';

            $activeWorksheet->setCellValue("A$row", $nomor);
            $activeWorksheet->setCellValue("B$row", $datas[$i]->id);
            $activeWorksheet->setCellValue("C$row", $datas[$i]->products_name);
            $activeWorksheet->setCellValue("D$row", $datas[$i]->products_cc);
            $activeWorksheet->setCellValue("E$row", $status);
        }

        $fileName = "$user_id Orders.xlsx";

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
    }
}
