<?php

namespace App\Http\Controllers;

use App\Models\categorys;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
   public function index($id){
       $products = product::get()->where('cat_id',$id);
       return view('user.products',['products'=>$products]);
   }

   public function showProduct($id){
       $product = product::find($id);
       $re_product = product::get()->where('cat_id',$product->cat_id);
       return view('user.single_product',['product'=>$product,'re_product'=>$re_product]);
   }

   public function show(){
       $product = product::get();
       $cat= categorys::get();
       return view('user.shop',['products'=>$product,'category'=>$cat]);
   }

   public function about(){
       return view('user.about');
   }

   public function search(Request $re){
      // dd($re);
       $pro = Product::where('name', $re->name)->first();
      // dd($pro->id);
       return redirect()->route('single-productRe',$pro->id);
   }
}
