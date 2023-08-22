<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategories;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $subcategories=Subcategories::where('status',1,)->get();
        $products=Product::where('status',1,)->get();

        return view('frontend.dashboard',compact('subcategories','products'));
    }


    public function category($id=null){
        if($id!=null){
            $products=Product::where('status',1,)->where('category_id',$id)->paginate();
            return view('frontend.products',compact('products'));
        }
    }
    public function subcategory($id=null){
        if($id!=null){
            $products=Product::where('subcategory_id',$id)->paginate();
            return view('frontend.products',compact('products'));
        }
    }
    public function product($slug=null){
        // $products = DB::table('products')->where('slug',$slug)->first();
        
        // dd($products);

        $product=Product::whereSlug($slug)->with('comments')->first();


        return view('frontend.product_detail',compact('product'));

    }
    PUBLIC function contact(){

    }
    public function search(Request $request){
        $search= $request['query'];
        if($search!=null){
            $products=Product::where('title','Like', '%'.$search.'%')->get();
            if(count($products)>0){
                return view('frontend.search', compact('products'));
            }
        }
        return abort(404);
    }

  
}
