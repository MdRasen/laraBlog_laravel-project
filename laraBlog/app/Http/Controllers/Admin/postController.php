<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class postController extends Controller
{
    public function create(){
        $categories = category::where('status', '=', '0')->get();
        return view("admin.post.create", compact('categories'));
    }

    public function createSubmit(Request $req){
        $this->validate($req,
            [
                "category_id"=>"required",
                "name"=>"required|string|max:80",
                "slug"=>"required|string|max:80",
                "description"=>"required|string",
                "image"=>"required|mimes:jpg,png,jpeg",
                "meta_title"=>"required|string|max:80",
                "meta_description"=>"nullable|string|max:500",
                "meta_keywords"=>"nullable|string|max:200",
                "status"=>"nullable",
            ],
            [
                'category_id.required' => 'No category, Create one first.',
            ]
        );

        $post = new post();
        $post->category_id = $req->category_id;
        $post->name = $req->name;
        $post->slug = Str::slug($req->slug);
        $post->description = $req->description;
        if($req->image){
            $extension = $req->file('image')->getClientOriginalExtension();
            $imagename = time().".".$extension;
            $req->file('image')->storeAs('public/post_images', $imagename);
            $post->image = $imagename;
        }
        $post->meta_title = $req->meta_title;
        $post->meta_description = $req->meta_description;
        $post->meta_keywords = $req->meta_keywords;
        $post->status = $req->status == "" ? '0':'1';
        $post->created_by = Auth::user()->id;;
        $post->save();

        return redirect('admin/view-post')->with('msg', 'Post has been added successfully!');
    }

    public function view(){
        $posts = post::all();
        return view("admin.post.view", compact('posts'));
    }

    public function edit($post_id){
        $categories = category::where('status', '=', '0')->get();
        $post = post::where('id', '=', $post_id)->first();
        return view("admin.post.edit", compact('post', 'categories'));
    }

    public function editSubmit($post_id, Request $req){
        $this->validate($req,
        [
            "category_id"=>"required",
            "name"=>"required|string|max:80",
            "slug"=>"required|string|max:80",
            "description"=>"required|string",
            "image"=>"mimes:jpg,png,jpeg",
            "meta_title"=>"required|string|max:80",
            "meta_description"=>"nullable|string|max:500",
            "meta_keywords"=>"nullable|string|max:200",
            "status"=>"nullable",
        ]);

        $post = post::where('id', '=', $post_id)->first();
        $post->category_id = $req->category_id;
        $post->name = $req->name;
        $post->slug = Str::slug($req->slug);
        $post->description = $req->description;
        if($req->image){
            $destination = 'storage/post_images/'.$post->image;

            //Problem deleting file:
            // if(file_exists(public_path($destination))) {
            //     unlink($destination); 
            //   }

            $extension = $req->file('image')->getClientOriginalExtension();
            $imagename = time().".".$extension;
            $req->file('image')->storeAs('public/post_images', $imagename);
            $post->image = $imagename;
        }
        $post->meta_title = $req->meta_title;
        $post->meta_description = $req->meta_description;
        $post->meta_keywords = $req->meta_keywords;
        $post->status = $req->status == "" ? '0':'1';
        $post->created_by = Auth::user()->id;;
        $post->update();

        return redirect('admin/view-post')->with('msg', 'Post has been updated successfully!');
    }

    public function delete(Request $req){
        $post = post::where('id', '=', $req->post_id)->delete();
        return redirect('admin/view-post')->with('msg', 'Post has been deleted successfully!');
    }
}
