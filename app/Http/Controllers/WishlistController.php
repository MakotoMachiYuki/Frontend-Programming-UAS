<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    // Show user's wishlist
// Show user's wishlist
public function showUserWishlist($userId)
{
    // Fetch the wishlist for the given user
    $wishlist = Wishlist::where('user_id', $userId)->first();

    // If no wishlist exists, create one with products as an empty string
    if (!$wishlist) {
        $wishlist = new Wishlist();
        $wishlist->user_id = $userId;
        $wishlist->products = '';  // Initialize as an empty string
        $wishlist->save();
    }

    // Convert the products string into an array before returning
    $productsArray = !empty($wishlist->products) ? explode(',', $wishlist->products) : [];
    $wishlist->products = $productsArray;

    return response()->json($wishlist);
}



    // Create a new wishlist if it doesn't exist
    public function create(Request $request)
    {
        $userId = Auth::id();

        // Check if the user already has a wishlist
        $existingWishlist = Wishlist::where('user_id', $userId)->first();
        if ($existingWishlist) {
            return response()->json(['message' => 'User already has a wishlist.'], 400);
        }

        // Create a new wishlist
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
        // Fetch the wishlist for the given user
        $wishlist = Wishlist::where('user_id', $userId)->first();
    
        // If no wishlist exists, create a new one with products as an empty string
        if (!$wishlist) {
            $wishlist = new Wishlist();
            $wishlist->user_id = $userId;
            $wishlist->products = '';  // Initialize as an empty string
            $wishlist->save();
        }
    
        // Convert the 'products' string to an array
        $productArray = !empty($wishlist->products) ? explode(',', $wishlist->products) : [];
    
        // Check if the product is already in the wishlist
        if (in_array($productId, $productArray)) {
            return response()->json(['message' => 'Product already in the wishlist.'], 400);
        }
    
        // Add the new product to the array
        $productArray[] = $productId;
    
        // Convert the array back to a comma-separated string and save
        $wishlist->products = implode(',', $productArray);
        $wishlist->save();
    
        return response()->json(['message' => 'Product added to wishlist.']);
    }
    
    
    
    
    
    
    


}
