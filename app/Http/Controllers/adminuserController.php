<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=user::get();
        return view('admin.users.show',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
             'role'=>'required',
        ]);
        user::create($validatedData);
        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = user::find($id);
        return view('admin.users.details',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = user::find($id);
        return view('admin.users.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role'=>'required',
        ]);
        user::find($id)->update($validated);
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::find($id)->delete();
        return redirect()->back();
    }
}
