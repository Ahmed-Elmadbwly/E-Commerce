<?php

namespace App\Http\Controllers;

use App\Models\categorys;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class adminproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=product::get();
        return view('admin.products.show',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat= categorys::get();
        return view('admin.products.create',['category'=>$cat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'price'=>'required',
            'des'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cat_id'=>'required'
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $validated['image'] = 'images/'. $imageName;
        product::create( $validated);
        return redirect()->route('products');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = product::find($id);
        $cat= categorys::find($data->cat_id);
        return view('admin.products.details',['data'=>$data,'category'=>$cat]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = product::find($id);
        $cat= categorys::get();
        return view('admin.products.edit',['data'=>$data,'category'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request,$id);
        $validated=$request->validate([
            'name'=>'required',
            'price'=>'required',
            'des'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cat_id'=>'required',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = 'images/'. $imageName;
        }
        product::find($id)->update($validated);
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        product::find($id)->delete();
        return redirect()->back();
    }
}
