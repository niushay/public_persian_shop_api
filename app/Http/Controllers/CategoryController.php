<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::get();

        return response()->json([
            'status' => 1,
            'message' => 'All categories',
            'data' => $categories
        ]);
    }

    public function category($id)
    {
        $category = Category::find($id);
        if($category == null) {
            return response()->json([
                'status' => 0,
                'message' => 'This Category Was Not Found',
                'data' => null
            ]);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Category ' . $id,
            'data' => $category
        ]);
    }

    public function subCategories($id)
    {
        $category = Category::with('categories')->find($id);
        if($category == null) {
            return response()->json([
                'status' => 0,
                'message' => 'This Category Was Not Found',
                'data' => null
            ]);
        }

        $sub_categories = $category -> categories;
        return response()->json([
            'status' => 1,
            'message' => 'زیرمجموعه دسته بندی ' . $category -> title,
            'data' => $sub_categories
        ]);
    }
}
