<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Page;
use Auth;

class CartController extends Controller
{


    public function cart()
    {
        $pages=Page::all();
        $cartCount = "";
        if(Auth::user()){
        $orders=Cart::where('user_id', Auth::user()->id)->get();
        $cartCount = Cart::where("user_id", Auth::user()->id)->get();
        }
        return view('site.cart',['pages'=>$pages,'orders' => $orders, 'cartCount' => $cartCount]);
    }



    public function store(Request $request)
    {
        $cart = new Cart;

        $cart->product_id = $request->input('product_id');
        $cart->user_id = Auth::user()->id;
        $cart->quantity = "1";

        $cart->save();

        return redirect()->back()->with('addToCartSuccess', 'Product has added to cart successfuly !');
    }

    public function update(Request $request, $id)
    {
        $cart = cart::find($id);

        $cart->quantity = $request->quantity;

        $cart->save();
        $cart = cart::find($id);

        return response()->json(['cart'=>$cart->quantity]);
    }

    public function destroy($id)
    {
        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back()->with('deletFromCartSuccess', 'Product has deleted successfuly !');
    }



}
