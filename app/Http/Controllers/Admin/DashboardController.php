<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [];
        $data['products'] = Product::latest()->paginate(6);
        $data['productsCount'] = Product::all()->count();
        return view('admin.dashboard' , compact('data'));
    }
}
