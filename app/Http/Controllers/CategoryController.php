<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function getCategoryIndex()
    {
        $categories = Category::orderBy('created_at', 'desc')
            ->paginate(5);
        return view('admin.blog.categories', ['categories' => $categories]);
    }

    public function postCategoryCreate(Request $req)
    {
        // valid input
        $this->validate($req, [
            'name' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $req['name'];
        if ($category->save())
        {
            // parsed in http.onreadystatechange function
            return Response::json(['message' => 'Create category successfully!'], 200);
        }
        return Response::json(['message' => 'Create category failed!'], 404);
    }


}
