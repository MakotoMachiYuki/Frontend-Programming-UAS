<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function showUserWishlist($userId)
    {
        $wishlist = Wishlist::where('user_id', $userId)->first();

        if (!$wishlist) {
            $wishlist = new Wishlist();
            $wishlist->user_id = $userId;
            $wishlist->products = '';
            $wishlist->save();
        }

        $productsArray = !empty($wishlist->products) ? explode(',', $wishlist->products) : [];
        $wishlist->products = $productsArray;

        return response()->json($wishlist);
    }

    public function create(Request $request)
    {
        $userId = Auth::id();

        $existingWishlist = Wishlist::where('user_id', $userId)->first();
        if ($existingWishlist) {
            return response()->json(['message' => 'User already has a wishlist.'], 400);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = $userId;
        $wishlist->products = [];

        if ($wishlist->save()) {
            return response()->json(['message' => 'Wishlist created successfully.']);
        }

        return response()->json(['message' => 'Failed to create wishlist.'], 500);
    }

    public function addProduct(Request $request, $userId, $productId)
    {
        $wishlist = Wishlist::where('user_id', $userId)->first();

        if (!$wishlist) {
            $wishlist = new Wishlist();
            $wishlist->user_id = $userId;
            $wishlist->products = '';
            $wishlist->save();
        }

        $productArray = !empty($wishlist->products) ? explode(',', $wishlist->products) : [];

        if (in_array($productId, $productArray)) {
            return response()->json(['message' => 'Product already in the wishlist.'], 400);
        }

        $productArray[] = $productId;

        $wishlist->products = implode(',', $productArray);
        $wishlist->save();

        return response()->json(['message' => 'Product added to wishlist.']);
    }

    // New method to remove a product from the wishlist
    public function removeProduct($userId, $productId)
    {
        $wishlist = Wishlist::where('user_id', $userId)->first();

        if (!$wishlist) {
            return response()->json(['message' => 'Wishlist not found.'], 404);
        }

        $productArray = !empty($wishlist->products) ? explode(',', $wishlist->products) : [];

        if (!in_array($productId, $productArray)) {
            return response()->json(['message' => 'Product not found in the wishlist.'], 404);
        }

        // Remove the product from the array
        $productArray = array_filter($productArray, function ($product) use ($productId) {
            return $product != $productId;
        });

        $wishlist->products = implode(',', $productArray);
        $wishlist->save();

        return response()->json(['message' => 'Product removed from wishlist.']);
    }
}
