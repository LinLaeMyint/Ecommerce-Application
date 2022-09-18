<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;

class ProductApi extends Controller
{
    public function detail($slug){
        $product=Product::where('slug',$slug)->with('brand','color','review','category')->first();
        return response()->json($product);
    }
    public function addToCart(){
        $product=Product::where('slug',request()->product_slug)->first();
        ProductCart::create([
            'product_id'=>$product->id,
            'user_id'=>auth()->id(),
            'total_quantity'=>1,
        ]);
        $cart_count=ProductCart::where('user_id',auth()->id())->count();
        return response()->json([
            'message'=>'added_to_cart',
            'cart_count'=>$cart_count,
        ]);
    }
}
