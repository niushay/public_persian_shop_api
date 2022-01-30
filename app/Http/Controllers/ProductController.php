<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Create Products view
    public function createView()
    {
        return view('products.create');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title'=> 'required|max:255',
            'description' => 'required',
            'price'=> 'required',
            'guaranty'=> 'required',
            'points'=> 'required',
            'seller_id'=> 'required',
            'category_id'=> 'required|max',
            'qty' => 'required|max'
        ]);
    }
}
