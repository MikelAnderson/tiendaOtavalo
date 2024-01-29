<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
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
        $viewData['comments'] = Comment::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $comments = Comment::where('id_product' , $id);
        $viewData["title"] = $product->getName()." - Online Store";
        $viewData["subtitle"] =  $product->getName()." - Product information";
        $viewData["product"] = $product;
        $viewData["comments"] = $comments;
        return view('product.show')->with("viewData", $viewData);
    }

    public function filter(Request $request){
    $products = Product::query();

    if ($request->input('category_id')) {
        $products->where('category_id', (int) $request->input('category_id'));
    }

    return $products->get();
    }

    public function featured() {
        $featuredProducts = Product::where('featured', true)->get();
        $viewData = [];
        $viewData["title"] = "Featured Products - Tienda Otavalo";
        $viewData["featuredProducts"] = $featuredProducts;
        return view('product.featured')->with("viewData", $viewData);
    }

    public function onSale() {
        $onSaleProducts = Product::where('sale', true)->get();
        $viewData = [];
        $viewData["title"] = "Featured Products - Tienda Otavalo";
        $viewData["onSaleProducts"] = $onSaleProducts;
        return view('product.sale')->with("viewData", $viewData);
    }
    
    public function search(Request $request){
        $query = $request->input('search');

        $products = Product::where('name', 'like', "%$query%")->get();

        return view('/')->with('products', $products);


    }
}
