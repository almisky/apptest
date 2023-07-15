<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Products extends Authenticatable
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

    public function get_products_list($username)
    {
        $product_list = DB::table('products')->where('user_input', $username)->get();

        return $product_list;
    }

    public function insert_products($data)
    {
        $insert = DB::table('products')->insert($data);

        return $insert;
    }

    public function get_product($id_product)
    {
        $product = DB::table('products')->where('id', $id_product)->first();

        return $product;
    }

    public function update_products($id_products, $data)
    {
        $tabel_products = DB::table('products')
            ->where('id', $id_products)
            ->update($data);
        return [$tabel_products];
    }

    public function delete_product($id_product)
    {
        $product = DB::table('products')->where('id', $id_product)->delete();

        return $product;
    }
}
