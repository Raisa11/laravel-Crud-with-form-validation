<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.home.home');

    }
    public function about(){
        return view('front.about.about');
    }
    public function services(){
        return view('front.services.services');
    }
    public function cases(){
        return view('front.cases.cases');
    }
    public function blog(){
        return view('front.blog.blog');
    }
    public function contact(){
        return view('front.contact.contact');
    }
}
