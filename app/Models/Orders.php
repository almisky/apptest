<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Orders extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function get_admin_orders_list()
    {

        $order_list = DB::table('orders')->get();

        return $order_list;
    }

    public function get_detail_product_by_data_order($user_id, $product_id, $role)
    {

        if ($role == 1) { //Admin
            $orders_details = DB::table('products')
                ->where('user_input', $user_id)
                ->where('id', $product_id)
                ->get();
        } else if ($role == 2) { //User
            $orders_details = DB::table('products')
                ->where('id', $product_id)
                ->get();
        }

        return $orders_details;
    }

    public function get_user_orders_list($user_id)
    {
        $order_list = DB::table('orders')
            ->where('id_user', $user_id)
            ->get();

        return $order_list;
    }

    public function get_user_orders_list_full_data($user_id)
    {
        $order_list = DB::select("SELECT *,
                                (SELECT products_name from products where id=products_id) as products_name,
                                (SELECT cc from products where id=products_id) as products_cc
                                FROM `orders` WHERE id_user=?", [$user_id]);
        return $order_list;
    }

    public function get_products_list_for_user()
    {
        $product_list = DB::table('products')->get();

        return $product_list;
    }

    public function insert_orders($data)
    {
        $insert = DB::table('orders')->insert($data);

        return $insert;
    }

    public function cancel_order($id_order)
    {
        $tabel_orders = DB::table('orders')
            ->where('id', $id_order)
            ->update(['status' => 0]);
        return [$tabel_orders];
    }

    public function delete_order($id_order)
    {
        $delete = DB::table('orders')->where('id', $id_order)->delete();

        return $delete;
    }
}
