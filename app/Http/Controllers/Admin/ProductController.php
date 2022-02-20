<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('admin.products.index');
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(ProductRequest $request, Product $product){
        $request->validated();
//        dd($request->validated());
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->Stock = $request->Stock;
        $product->save();
        return redirect()->back()->with('success', 'the product is added');
    }


    public function edit($id){

        $data = [];

        $data['product'] = Product::findOrFail($id);

        return view('admin.products.edit' , [
              'data' => $data
        ]);
    }

    public function update(ProductRequest $request, $id){
        $request->validated();
        $product = Product::findOrFail($id);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->Stock = $request->Stock;
        $product->save();
        return redirect()->back()->with('success', 'The product is updated');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('delete' , 'The product is deleted');
    }

}
