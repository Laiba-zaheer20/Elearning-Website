<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin/dashboard');
    }

    public function teachers(){
        return view('admin/teachers');
    }

    public function students(){
        return view('admin/students');
    }

    public function courses(){
        return view('admin/courses');
    }

    public function coursesOffered(){
        return view('admin/coursesOffered');
    }

    public function registration(){
        return view('admin/registration');
    }

    public function complain(){
        return view('admin/complain');
    }
    public function feedback(){
        return view('admin/feedback');
    }
     
}
