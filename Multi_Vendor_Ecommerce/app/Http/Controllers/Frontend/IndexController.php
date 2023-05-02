<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;

class IndexController extends Controller
{
    public function ProductDetails($id, $slug)
    {

        $product = Product::findOrFail($id);



        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);


        $multiImage = MultiImg::where('product_id', $id)->get();

        $cat_id = $product->category_id;

        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(4)->get();

        return view('frontend.product.product_details', compact('product', 'product_color', 'product_size', 'multiImage', 'relatedProduct'));
    } // End Method 
    public function Index()
    {
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->limit(5)->get();

        return view('frontend.index', compact('skip_category_0', 'skip_product_0'));
    } // End Method 

}
