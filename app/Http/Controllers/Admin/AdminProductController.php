<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        $viewData["categories"] = Category::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription(strip_tags($request->input('description')));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setDiscountedPrice($request->input('discountedPrice'));
        $newProduct->setImage('/img/game.png');
        $newProduct->setCategory($request->input('category'));
        $newProduct->setFeatured($request->input('featured'));
        $newProduct->setSale($request->input('sale'));
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = "prodIMG_" . $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return back();
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Product - Online Store";
        $viewData["product"] = Product::findOrFail($id);
        $viewData["categories"] = Category::all();
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription(strip_tags($request->input('description')));
        $product->setPrice($request->input('price'));
        $product->setCategory($request->input('category'));
        $product->setFeatured($request->input('featured'));
        $product->setSale($request->input('sale'));

        if ($request->hasFile('image')) {
            $imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }

        $product->save();
        return redirect()->route('admin.product.index');
    }
}
