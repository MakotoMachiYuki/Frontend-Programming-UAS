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

    public function productDetail($productName)
    {
        $product = Products::where('productName', $productName)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);

    }

    public function getComments($productName) {
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

    public function updateComment(Request $request, $commentId){
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

    public function deleteComment($commentId){
        $comment = Comments::find($commentId);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
        }
}