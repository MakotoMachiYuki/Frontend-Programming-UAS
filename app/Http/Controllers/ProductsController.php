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

    public function updateProduct($productName, Request $request)
    {
        $product = Products::where('productName', $productName)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->productName = $request->input('productName');
        $product->lowestPrice = $request->input('lowestPrice');
        $product->highestPrice = $request->input('highestPrice');
        $product->category = $request->input('category');
        $product->save();

        return response()->json(['message' => 'Product updated successfully!']);
    }
    public function deleteProduct($productName)
    {
        $product = Products::where('productName', $productName)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }


        $product->delete();

        return response()->json(['message' => 'Product deleted successfully!']);
    }



}
