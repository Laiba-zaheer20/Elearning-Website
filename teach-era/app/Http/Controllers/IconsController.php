<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconsController extends Controller
{
    //
    public function index(){
        return view('admin/icons');
    }

}
