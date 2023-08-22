<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{

    public function index()
    {
        $products= Product::all();
        return view('admin.product.product_list',compact('products'));
    }

 
    public function create()
    {
        $products= Product::all();
        $categories= Category::all();
        $subcategories= SubCategories::all();
        return view('admin.product.add_product',compact('products','categories','subcategories'));
    }
    

    
    public function store(Request $request)
    {
     
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'price'=>'required',
        ]);
        $product= new Product;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->category_id=$request->category;
        $product->subcategory_id=$request->subcategory;
        $product->title= $request->title;
        $product->slug=Str::slug($request->title);
        $product->price=$request->price;
        $product->status=$request->status;
        $product->Image=$imageName;
        $product->save();
        // session()->flash('success','New Product added successfully!');
        
        return redirect()->route('products.create');


    }

   
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
