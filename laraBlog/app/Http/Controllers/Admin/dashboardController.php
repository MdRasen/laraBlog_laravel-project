<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\user;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $numCategory = category::count();
        $numPost = post::count();
        $numUser = user::count();

        $posts = post::all();

        return view("admin.dashboard", compact('numCategory', 'numPost', 'numUser', 'posts'));
    }
}
