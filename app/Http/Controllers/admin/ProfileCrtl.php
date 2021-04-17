<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileCrtl extends Controller
{
    public function index(){
        return view('admin.profile');
    }

    public function update(Request $request){

        $user = Admin::find($request->user_id);

        $r_image = $request->user_image;
        $user_image = time(). '.' . $r_image->getClientOriginalExtension();
        $path = public_path('admin/users_imgs');
        $r_image->move($path ,$user_image);


        $user->update([
            'name' => $request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'user_image' => $user_image,
        ]);

        Session::flash('update','The Informations Updated Successfuly !');


        return redirect()->route('admin.profile');


        



    }
}
