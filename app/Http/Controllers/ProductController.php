<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');

        $products = Product::when($categoryId, function($query) use ($categoryId){
            return $query->where('category_id', $categoryId);
        })->get();
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = $products;
        $viewData["categories"] = Category::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName()." - Online Store";
        $viewData["subtitle"] =  $product->getName()." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function filter(Request $request){
    $products = Product::query();

    if ($request->input('category_id')) {
        $products->where('category_id', (int) $request->input('category_id'));
    }

    return $products->get();
    }
}
