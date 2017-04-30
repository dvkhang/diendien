<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
    public function getAdd()
    {
        $categories = Category::all();
        return view('admin.categories.add', compact('categories'));
    }

    public function postAdd(Request $request)
    {
        $category = new Category();

        $category->name   = $request->name;
        $category->status = $request->status;
        $category->featured =0;
        if($request->featured == 'on'){$category->featured = 1;}
        $category->parent_id = 0;
        if (!empty($request->parent)) {$category->parent_id = $request->parent;}
        $category->save();
        if ($request->hasFile('image')) {
            $category->addMedia($request->image)->toMediaLibrary('image');
        }
        return Redirect::to('admin/category/list');
    }

    public function getList()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    // sua

    public function getEdit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function postEdit(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name   = $request->name;
        $category->status = $request->status;
        $category->featured =0;
        if($request->featured == 'on'){$category->featured = 1;}
        $category->save();
        if ($request->hasFile('image')) {
            $category->addMedia($request->image)->toMediaLibrary('image');
        }
        return Redirect::to('admin/category/list');

    }
    public function getEditStt(Request $request)
    {

        $category         = Category::find($request->id);
        $category->status = $request->value;
        $category->save();

    }

    public function getDelete(Request $request)
    {
        $category = Category::find($request->id);
        $flag = Category::where('parent_id',$category->id)->first();
        if ($flag == null){
            $category->delete();
            return response()->json();
        }
        return 0;

    }
}
