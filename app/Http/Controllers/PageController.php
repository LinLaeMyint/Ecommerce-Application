<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }
    public function allProduct(){
        $category=Category::withCount('product')->get();
        $color=Color::all();
        $brand=Brand::all();
        $product=Product::latest();
        //filer category
        if($category_slug=request()->category){
        $categoryData=Category::where('slug',$category_slug)->first();
        if(!$categoryData){
            return redirect()->back()->with('error','Category Not Found');
        }
        $product->where('category_id',$categoryData->id);
        }
        //filer brand
        if($brand_slug=request()->brand){
            $brandData=Brand::where('slug',$brand_slug)->first();
            if(!$brandData){
                return redirect()->back()->with('error','Brand Not Found');
            }
            $product->where('brand_id',$brandData->id);
            }
             //filer color
        if($color_slug=request()->color){
            $colorData=Color::where('slug',$color_slug)->first();
            if(!$colorData){
                return redirect()->back()->with('error','Color Not Found');
            }

            $product->whereHas('color',function($q) use ($colorData){
                $q->where('product_color.color_id',$colorData->id);
            });
            }
            //filer by name
            if($name=request()->name){
                $product->where('name','like',"%$name%");
            }

    $product=$product->paginate(6);

// return $product;
        return view('all-product',compact('category','color','brand','product'));
    }
    public function productDetail($slug){
        $product=Product::where('slug',$slug)->first();
        if(!$product){
            return redirect('/')->with('error','Product Not Found');
        }
        $category=Category::withCount('product')->get();
        return view('product-detail',compact('category','slug'));
    }
}
