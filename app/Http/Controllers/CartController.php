<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // View
    function index() {
        $cartItems = Cart::with("product.image")->get();
        return view("pages.cart.index", [
            "cartItems" => $cartItems,
            'subtotal' => $cartItems->sum("product.price"),
            "tax" => 0,
            "total" => 0
        ]);
    }

    // Services
    function create(Request $req) {
        Cart::updateOrCreate([
            "user_id" => Auth::user()->id,
            "product_id" => $req->product_id,
        ],[
            "user_id" => Auth::user()->id,
            "product_id" => $req->product_id
        ]);
        return back()->with("message", "Item berhasil dimasukan ke keranjang !.");
    }
    function update(Request $id) {}
    function delete($id) {
        Cart::destroy($id);
        return back()->with("message", "Item berhasil dimasukan ke keranjang !.");
    }
}
