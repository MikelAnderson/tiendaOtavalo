<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Categories - Online Store";
        $viewData["categories"] = Category::all();
        return view('admin.categories.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Category::validate($request);

        $newCategory = new Category();
        $newCategory->setName($request->input('name'));
        $newCategory->setImage('safe.png');
        $newCategory->save();

        if ($request->hasFile('categoryImage')) {
            $imageName = $newCategory->getId().".".$request->file('categoryImage')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('categoryImage')->getRealPath())
            );
            $newCategory->setImage($imageName);
            $newCategory->save();
        }

        return back();
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Product - Online Store";
        $viewData["category"] = Category::findOrFail($id);
        return view('admin.categories.edit')->with("viewData", $viewData);


    }

    public function update(Request $request, $id)
    {
        Category::validate($request);

        $category = Category::findOrFail($id);
        $category->setName($request->input('name'));
        if ($request->hasFile('categoryImage')) {
            $imageName = "categoryID_".$category->getId().".".$request->file('categoryImage')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('categoryImage')->getRealPath())
            );
            $category->setImage($imageName);
        }

        $category->save();
        return redirect()->route('admin.categories.index');
    }
}
