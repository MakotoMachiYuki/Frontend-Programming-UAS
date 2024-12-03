<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function productsView()
    {
        return view("product-detail");
    }

    public function showAllProducts()
    {
        $products = Products::all();
        return response()->json($products);
    }

    public function productDetail($productName)
    {
        $product = Products::where('productName', $productName)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);

    }



}
