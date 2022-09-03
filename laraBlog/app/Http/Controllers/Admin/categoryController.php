<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
                "image"=>"mimes:jpg,png,jpeg",
                "meta_title"=>"required|string|max:100",
                "meta_description"=>"nullable|string|max:200",
                "meta_keywords"=>"nullable|string|max:200",
                "navbar_status"=>"nullable",
                "status"=>"nullable",
            ]);

        $category = new category();
        $category->name = $req->name;
        $category->slug = Str::slug($req->slug);
        $category->description = $req->description;

        if($req->image){
            $extension = $req->file('image')->getClientOriginalExtension();
            $imagename = time().".".$extension;
            $req->file('image')->storeAs('public/category_images', $imagename);
            $category->image = $imagename;
        }
        
        $category->meta_title = $req->meta_title;
        $category->meta_description = $req->meta_description;
        $category->meta_keywords = $req->meta_keywords;
        $category->navbar_status = $req->navbar_status == "" ? '0':'1';
        $category->status = $req->status == "" ? '0':'1';
        $category->created_by = Auth::user()->id;;
        $category->save();

        return redirect('admin/view-category')->with('msg', 'Category has been added successfully!');
    }

    public function view(){
        $categories = category::all();
        return view("admin.category.view", compact('categories'));
    }

    public function edit($category_id){

        $category = category::where('id', '=', $category_id)->first();
        return view("admin.category.edit", compact('category'));
    }

    public function editSubmit($category_id, Request $req){
        $this->validate($req,
            [
                "name"=>"required|string|max:100",
                "slug"=>"required|string|max:100",
                "description"=>"required|string|max:200",
                "image"=>"mimes:jpg,png,jpeg",
                "meta_title"=>"required|string|max:100",
                "meta_description"=>"nullable|string|max:200",
                "meta_keywords"=>"nullable|string|max:200",
                "navbar_status"=>"nullable",
                "status"=>"nullable",
            ]);

        $category = category::where('id', '=', $category_id)->first();
        $category->name = $req->name;
        $category->slug = Str::slug($req->slug);
        $category->description = $req->description;

        if($req->image){
            $destination = 'storage/category_images/'.$category->image;

            //Problem deleting file:
            // if(file_exists(public_path($destination))) {
            //     unlink($destination); 
            //   }

            $extension = $req->file('image')->getClientOriginalExtension();
            $imagename = time().".".$extension;
            $req->file('image')->storeAs('public/category_images', $imagename);
            $category->image = $imagename;
        }
        $category->meta_title = $req->meta_title;
        $category->meta_description = $req->meta_description;
        $category->meta_keywords = $req->meta_keywords;
        $category->navbar_status = $req->navbar_status == "" ? '0':'1';
        $category->status = $req->status == "" ? '0':'1';
        $category->created_by = Auth::user()->id;;
        $category->update();
        return redirect('admin/view-category')->with('msg', 'Category has been updated successfully!');
    }

    public function delete($category_id){
        $category = category::where('id', '=', $category_id)->delete();
        return redirect('admin/view-category')->with('msg', 'Category has been deleted successfully!');
    }
}
