<?php

namespace App\Http\Controllers;

use App\Models\user_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cardController extends Controller
{
    public function index(){
        $data = DB::table('user_products')
            ->join('users', 'users.id', '=', 'user_products.user_id')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->select('products.name', 'products.price', 'products.image','user_products.quantity','user_products.id')
            ->where('users.id',Auth::user()->id)->get();
        return view('user.card',['data'=>$data,'total'=>0]);
    }

    public function create(Request $re){
        //dd($re);
        user_product::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$re->product_id,
            'quantity'=>$re->number ? $re->number : 1,
            'check_in'=>false,
        ]);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function delete($id){
        user_product::find($id)->delete();
        return redirect()->back();
    }
    public function updateQuantity(Request $request)
    {
       user_product::find($request->rowid)->update(['quantity'=>$request->quantity]);
        return redirect()->back();
    }

}
