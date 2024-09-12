<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::orderBy('id','desc')->get();
        $total = Product::count();
        return view('admin.product.home', compact(['products','total']));
    }

    public function create(){
        
        return view('admin.product.create');
    }
    public function save(Request $request){
        $validation = $request->validate([
            'title'=> 'required',
            'category'=> 'required',
            'price'=> 'required'
        ]);

        $data = Product::create($validation);

        if($data){
            session()->flash('success','Product Add Successfuly');
            return redirect( route('admin/products'));
        }
        else{
            session()->flash('error','Some problem occure');
            return redirect( route('admin.products/create'));
        }
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact(['product']));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;

        $product->title = $title;
        $product->category = $category;
        $product->price = $price;
        $data = $product->save();

        if($data){
            session()->flash('success','Product Update Successfuly');
            return redirect( route('admin/products'));
        }
        else{
            session()->flash('error','Some problem occure');
            return redirect( route('admin.products/update'));
        }
    }

    public function delete($id){
        $product = Product::findOrFail($id)->delete();

        if($product){
            session()->flash('success','Product Delete Successfuly');
            return redirect( route('admin/products'));
        }
        else{
            session()->flash('error','Product not Delete Successfuly');
            return redirect( route('admin.products'));
        }
    }

    
}
