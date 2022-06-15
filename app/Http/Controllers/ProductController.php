<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Seller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Create Products view
    public function createView()
    {
        $sellers = Seller::all();
        $categories = Category::all();

        return view('products.create', compact(['sellers', 'categories']));
    }

    public function create(Request $request)
    {
//        $validated = $request->validate([
//            'title'=> 'required|max:255',
//            'price'=> 'required',
//            'points'=> 'required|max:5',
//            'seller_id'=> 'required',
//            'category_id'=> 'required',
//            'qty' => 'required'
//        ]);

        $product = Product::create([
            'title'=> $request->title,
            'description' =>  $request->description,
            'price'=>  $request->price,
            'guaranty'=>  $request->guaranty,
            'points'=>  $request->points,
            'seller_id'=>  $request->seller_id,
            'category_id'=>  $request->category_id,
            'qty' =>  $request->qty
        ]);

        //Photo upload
        if($request->file('photos')){
            foreach ($request->file('photos') as $uploaded_photo){
                $path = $uploaded_photo->store('product_photos');
                $fixed_path = 'storage/'.$path;
                ProductPhoto::create([
                    'product_id'=>$product->id,
                    'photo_url'=>$fixed_path
                ]);
            }
        }
        //Redirect
        return redirect()->back()->with('success','محصول با موفقیت درج شد');
    }
}
