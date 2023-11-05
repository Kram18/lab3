<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        //
    }
    public function mark()
    {
        return view('main');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function coffees()
    {
        return view('coffees');
    }
    public function blog()
    {
        return view('blog');
    }
}