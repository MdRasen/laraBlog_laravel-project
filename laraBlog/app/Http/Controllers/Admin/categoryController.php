<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Auth;

class categoryController extends Controller
{
    public function create(){
        return view("admin.category.create");
    }

    public function createSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|string|max:100",
                "slug"=>"required|string|max:100",
                "description"=>"required|string|max:200",
                "image"=>"required|mimes:jpg,png,jpeg",
                "meta_title"=>"required|string|max:100",
                "meta_description"=>"required|string|max:200",
                "meta_keywords"=>"required|string|max:200",
                "navbar_status"=>"nullable",
                "status"=>"nullable",
            ]);

        $category = new category();
        $category->name = $req->name;
        $category->slug = $req->slug;
        $category->description = $req->description;

        $extension = $req->file('image')->getClientOriginalExtension();
        $imagename = time().".".$extension;

        $req->file('image')->storeAs('public/category_images', $imagename);

        $category->image = $imagename;
        $category->meta_title = $req->meta_title;
        $category->meta_description = $req->meta_description;
        $category->meta_keywords = $req->meta_keywords;
        $category->navbar_status = $req->navbar_status == "" ? '0':'1';
        $category->status = $req->status == "" ? '0':'1';
        $category->created_by = Auth::user()->id;;
        $category->save();

        return redirect('admin/view-category')->with('msg', 'Category added successfully!');
    }

    public function view(){
        $categories = category::all();
        return view("admin.category.view", compact('categories'));
    }
}
