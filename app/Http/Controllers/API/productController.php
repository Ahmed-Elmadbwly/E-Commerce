<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\productre;
use App\Http\Resources\productresource;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function allproduct(){
        $data=product::get();
        if($data==null){
            return response()->json(["msg"=>"Products not found"],404);
        }
        return productresource::collection($data);
    }

    public function store(productre $re){
        $data = Validator::make($re->all(), [$re->validated()]);
        if($data->fails()){
            return response()->json(["errors"=>$data->errors()],301);
        }
        $data=$re->validated();
        $image = $re->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $data['image'] = 'images/'. $imageName;

        product::create($data);
        return response()->json(["msg"=>"Product added successuflly"],201);
    }

    public function show($id){
        $data = product::find($id);
        if($data == null){
            return response()->json(['msg'=>'not found'],404);
        }
        return new productresource($data);
    }

    public function update($id,productre $re){
        $data = Validator::make($re->all(), [$re->validated()]);
        if($data->fails()){
            return response()->json(["errors"=>$data->errors()],301);
        }
        $pro=product::find($id);
        if($pro == null){
            return response()->json(['msg'=>'not found'],404);
        }
        $data = $re->validated();
        if($re->hasFile('image')){
            $image = $re->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/'. $imageName;
        }
        $pro->update($data);
        return response()->json(['msg'=>'updated successfully',"product"=>new ProductResource($pro)],201);
    }

    public function destroy($id){
        $data = product::find($id);
        if($data == null){
            return response()->json(['msg'=>'not found'],404);
        }
        $data->delete();
        return response()->json(['msg'=>'Deleted successfully'],201);
    }
}
