<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
       /**
     * 商品情報
     * 
     * @param void
     * @return json
     */
    public function productData(Request $request)
    {
        $query = Product::query();

        if ($request->has('keywords') && !empty($request->keywords)) {
            $keywords = $request->input('keywords');
            $query->where('name', 'like', '%' . $keywords . '%');
        }
        $products = $query->paginate(3);
        return response()->json($products);
    }
}
