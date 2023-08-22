<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Models\categories;
use App\Models\Category;



class SubcategoriesController extends Controller
{
    public function index()
    {
        $subcategories = Subcategories::all();
        return view('admin.category.Sub_Category_list', compact('subcategories'));
    }


    public function create()
    {
        
        $categories= Category::all();
        $subcategories= SubCategories::all();
        return view('admin.category.add_sub_category',compact('categories','subcategories'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required',
            'sub_category'=>'required',
            'desc'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);
            $contact= new SubCategories;
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $contact->category_id= $request->category;
            $contact->title= $request->sub_category;
            $contact->status= $request->status;
            $contact->discreption=$request->desc;
            $contact->Image = $imageName;
            $contact->save();
            session()->flash('success','New Subcategory added successfully!');
            return redirect()->back();
    }

  
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $subcategories = Subcategories::findorfail($id);
        $categories= Category::all();
        return view('admin.category.edit_sub_category',compact('subcategories','categories'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'sub_category'=> 'required',
            'status' => 'required',
            'desc' => 'required',
        ]);
        $data = [
            'category_id'=> $request->category,
            'status' => $request->status,
            'title' => $request->sub_category,
            'discreption'=>$request->desc,
        ];
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['Image'] =$imageName;
        }
        Subcategories::where('id',$id)->update($data);
        session()->flash('success','updated successfully');
        return redirect()->route('subcategories.index');
    }


    public function destroy($id)
    {
        //
    }
}
