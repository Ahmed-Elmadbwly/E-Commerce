<?php

namespace App\Http\Controllers;

use App\Models\categorys;
use Illuminate\Http\Request;

class categorysController extends Controller
{
    public function index(){
        $data = categorys::all();
        //dd($data);
        return view('user.welcome',['products'=>$data]);
    }
}
