<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function showAllProducts()
    {
        $products = Products::all();
        return response()->json($products);
    }
}
