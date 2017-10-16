<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Database\QueryException;
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

    public function getCategoryDelete($category_id)
    {
        $category = Category::find($category_id);
        // detach post
        // Integrity constraint violation if not detach
        $category->posts()->detach();

        if ($category->delete())
        {
            return Response::json(['message' => 'Delete Category successfully!'], 200);
        }
        return Response::json(['message' => 'Delete Category failed!'], 404);
    }

    public function postCategoryUpdate(Request $req)
    {
        // valid input
        $this->validate($req, [
            'name' => 'required|unique:categories'
        ]);
        // find
        $category = Category::find($req['category_id']);
        if (!$category)
        {
            return Response::json(['message' => 'Update Category failed!'], 404);
        }
        // detach

        // update
        $category->name = $req['name'];
        $category->update();
        // return json
        return Response::json(['message' => 'Update Category successfully!'
            , 'new_name' => $category->name], 200);
    }
}
