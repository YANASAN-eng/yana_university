<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'product_image',
    ];
    /**
     * 全商品取得
     * 
     * @param void
     * @return void
     */
    public function allProduct()
    {
        return $this->get();
    }

    /**
     * 商品登録処理
     * 
     * @param ProductRequest $request
     * @return void
     */
    public function insertProduct($request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'product_image' => basename($request->file('product_image')->store('products', 'public')),
        ]);
    }
    /**
     * 商品削除処理
     * 
     * @param int
     * @return void
     */
    public function deleteProduct(int $id)
    {
        return $this->where('id', $id)->delete();
    }
}
