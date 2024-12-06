<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Comments;
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

    public function productDetailName($productName)
    {
        $product = Products::where('productName', $productName)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);

    }

    public function productDetailId($productId)
    {
        $product = Products::where('_id', $productId)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);

    }

    public function getProductsByCategory($category)
    {
        $products = Products::where('category', $category)->get();

        if ($products->isEmpty()) {
            return response()->json(['error' => 'No products found for this category'], 404);
        }

        return response()->json($products);
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


    public function getComments($productName)
    {
        $comments = Comments::where('product_name', $productName)->get();
        return response()->json($comments);
    }

    public function addComment(Request $request, $productName)
    {
        $comment = new Comments();
        $comment->product_name = $productName;
        $comment->user_name = $request->input('user_name');
        $comment->user_email = $request->input('user_email');
        $comment->content = $request->input('content');
        $comment->save();

        return response()->json($comment);
    }

    public function updateComment(Request $request, $commentId)
    {
        $comment = Comments::find($commentId);
        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }


        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->content = $request->input('content');
        $comment->save();

        return response()->json($comment);
    }


    public function deleteComment($commentId)
    {
        $comment = Comments::find($commentId);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
