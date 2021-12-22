<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Create Products view
    public function create()
    {
        return view('products.create');
    }
}
