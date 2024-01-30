<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', true)->get();
        $viewData = [];
        $viewData["title"] = "Home Page - Tienda Otavalo";
        $viewData["featuredProducts"] = $featuredProducts;
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "About us - Online Store";
        $viewData["subtitle"] =  "About us";
        $viewData["description"] =  "This is an about page ...";
        $viewData["author"] = "Developed by: Mikel Otavalo";
        return view('home.about')->with("viewData", $viewData);
    }

    public function searchProduct(Request $request){
        $find = $request->input('search');

        $products = DB::table('products')->where('name', 'like', '%' . $find . '%')->get();
        return view('home.search', compact('products'));
    }

}
