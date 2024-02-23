<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryre;
use App\Http\Requests\productRe;
use App\Http\Resources\categoryresource;
use App\Http\Resources\productresource;
use App\Models\categorys;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function allcategory(){
        $data=categorys::get();
        if($data==null){
            return response()->json(["msg"=>"Category not found"],404);
        }
        return categoryresource::collection($data);
    }

    public function store(categoryre $re){
        $data = Validator::make($re->all(), [$re->validated()]);
        if($data->fails()){
            return response()->json(["errors"=>$data->errors()],301);
        }
        $data=$re->validated();
        $image = $re->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $data['image'] = 'images/'. $imageName;

        categorys::create($data);
        return response()->json(["msg"=>"Category added successfully"],201);
    }

    public function show($id){
        $data = categorys::find($id);
        if($data == null){
            return response()->json(['msg'=>'not found'],404);
        }
        return new categoryresource($data);
    }

    public function update($id,categoryre $re){
        $data = Validator::make($re->all(), [$re->validated()]);
        if($data->fails()){
            return response()->json(["errors"=>$data->errors()],301);
        }
        $pro=categorys::find($id);
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
        return response()->json(['msg'=>'updated successfully',"product"=>new categoryresource($pro)],201);
    }

    public function destroy($id){
        $data = categorys::find($id);
        if($data == null){
            return response()->json(['msg'=>'not found'],404);
        }
        $data->delete();
        return response()->json(['msg'=>'Deleted successfully'],201);
    }
}
