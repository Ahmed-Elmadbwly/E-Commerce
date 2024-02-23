<?php

namespace App\Http\Controllers;

use App\Models\categorys;
use Illuminate\Http\Request;

class admincategorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=categorys::get();
        return view('admin.categorys.show',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'des'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $validated['image'] = 'images/'. $imageName;
        categorys::create( $validated);
        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = categorys::find($id);
        return view('admin.categorys.details',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = categorys::find($id);
        return view('admin.categorys.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated=$request->validate([
            'name'=>'required',
            'des'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = 'images/'. $imageName;
        }
        categorys::find($id)->update($validated);
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        categorys::find($id)->delete();
        return redirect()->back();
    }
}
