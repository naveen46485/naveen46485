<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Category;
class CategoriesController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }


    public function create()
    {
        $Categories =  Category::all();
        return view('admin.category.add_category', compact('Categories'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'status' => 'required',
        ]);
        $category = categories::where('title', $request->category)->first();


        if ($category == NULL) {
            $contact = new  Category;
            $contact->title = $request->category;
            $contact->status = $request->status;
            $contact->save();

            session()->flash('success', 'New Category added successfully!');
            return redirect()->back();
        }
        session()->flash('error', 'category already exist');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categories= Category::findorfail($id);
        return view('admin.category.edit_category',compact('categories'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'status' => $request->status,
            'title' => $request->category
        ];
        Category::where('id',$id)->update($data);
      

        session()->flash('success','updated successfully');
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        Category::whereId($id)->delete();
        return redirect()->route('categories.index');
    }
}
