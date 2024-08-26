<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all banners and products from the database
        $banners = Banner::all();
        $products = Product::all(); // Use `all()` to get all products

        // Pass both banners and products to the view
        return view('home', [
            'banners' => $banners,
            'products' => $products
        ]);
    }
}
