<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data =[];
        $data['products'] = Product::all();
        return view('customer.products.index', compact('data'));
    }
}
