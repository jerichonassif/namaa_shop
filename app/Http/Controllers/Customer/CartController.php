<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use function Symfony\Component\HttpKernel\HttpCache\save;

class CartController extends Controller
{
    public function index(){
        $data = [];
        $data['carts'] = auth()->user()->carts->all();
        $data['carts_count'] = auth()->user()->carts->count();
        return view('customer.carts.index', compact('data'));
    }

    public function store(CartRequest $request,$id){
        $request->validated();
        $name = auth()->user()->name;
        $product = Product::findOrFail($id);
        if($product->Stock >= $request->quantity){
            $cart = new Cart();
            $cart->name = $name;
            $cart->user_id = auth()->user()->id;
            $cart->product_title = $product->title;
            $cart->image = $product->image;
            $cart->quantity = $request->quantity;
            $cart->save();
            $product->Stock = $product->Stock - $request->quantity;
            $product->save();
            return redirect()->back()->with('success' , 'The product is added to cart');
        }else{
            return redirect()->back()->with('error' , 'The quantity you ordered is not available in stock');

        }



    }

    public function edit(){

    }

    public function delete($id){
        $cart = Cart::findOrFail($id);
        $q = Product::Where('title' , $cart->product_title)->first();
        $cart->delete();
        $q->Stock = $q->Stock + $cart->quantity;
        $q->save();
        return redirect()->back()->with('delete' , 'The cart is deleted');
    }

    public function empty(){
        $carts = auth()->user()->carts;
        foreach ($carts as $cart){
            $q = Product::Where('title' , $cart->product_title)->first();
            $cart->delete();
            $q->Stock = $q->Stock + $cart->quantity;
            $q->save();
        }
        return redirect()->back()->with('empty' , 'The cart is empty');
    }
}
