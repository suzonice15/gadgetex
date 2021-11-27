<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('fontend.home.home');
    }
    public function category(){
        return view('fontend.category.category');
    }

     
}
