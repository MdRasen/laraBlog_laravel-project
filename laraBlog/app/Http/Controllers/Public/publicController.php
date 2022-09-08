<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\comment;
use App\Models\post;

class publicController extends Controller
{
    public function index(){
        $latestposts = post::where('status', '=', '0')->orderBy('created_at' , 'DESC')->get()->take(6);
        $otherposts = post::where('status', '=', '0')->get()->take(6);
        return view('public.index', compact('latestposts','otherposts'));
    }

    public function categoryPosts($category_slug){
        $category = category::where('slug', '=', $category_slug)->first();
        $latestposts = post::where('status', '=', '0')->orderBy('created_at' , 'DESC')->get()->take(6);

        if($category){
            $posts = post::where('category_id', '=', $category->id)->get();
            return view('public.categorypost', compact('posts', 'category', 'latestposts'));
        }
        else{
            return redirect('/');
        }

    }

    public function viewpost($category_slug, $post_slug){

        $category = category::where('slug', '=', $category_slug)->first();
        if($category){

            $post = post::where('category_id', '=', $category->id)
            ->where('slug', '=', $post_slug)->where('status', '=', '0')
            ->first();

            if($post){
                $latestposts = post::where('status', '=', '0')->orderBy('created_at' , 'DESC')->get()->take(6);
                $comments = comment::where('post_id', '=',  $post->id)->get();
                $numofcomments = comment::where('post_id', '=',  $post->id)->get()->count();
                
                return view('public.viewpost', compact('latestposts', 'post', 'comments', 'numofcomments'));
            }
        }
        else{
            return redirect('/');
        }
    }

    public function commentSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|string|max:50",
                "email"=>"nullable|email",
                "comment"=>"required|string|max:200",
            ]);

        $comment = new comment();
        $comment->post_id = $req->post_id;
        $comment->name = $req->name;
        $comment->email = $req->email;
        $comment->comment = $req->comment;
        $comment->save();

        // return redirect('admin/view-category')->with('msg', 'Category has been added successfully!');
        return back();
    }
}
