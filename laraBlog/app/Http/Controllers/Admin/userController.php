<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function view(){
        $users = user::all();
        return view("admin.user.view", compact('users'));
    }

    public function edit($user_id){
        $user = user::where('id', '=', $user_id)->first();
        return view("admin.user.edit", compact('user'));
    }

    public function editSubmit($user_id, Request $req){
        $this->validate($req,
        [
            "role_as"=>"required",
        ]);

        $user = user::where('id', '=', $user_id)->first();
        $user->role_as = $req->role_as;
        $user->update();

        return redirect('admin/users')->with('msg', 'User has been updated successfully!');
    }

    public function delete($user_id){
        $user = user::where('id', '=', $user_id)->delete();
        return redirect('admin/users')->with('msg', 'User has been deleted successfully!');
    }
}
