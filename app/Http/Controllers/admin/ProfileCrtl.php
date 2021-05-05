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

    public function Info_update(Request $request){

        $request->validate([

            'phone' => 'required',
            'email' =>'required',
            'name' =>'required',
            
         ]);

        $user = Admin::find($request->user_id);
        
        if($request->hasFile('user_image')){
            $r_image = $request->file('user_image');
            $user_image = time(). '.' . $r_image->getClientOriginalExtension();
            $path = public_path('admin/users_imgs');
            $r_image->move($path ,$user_image);

            $user->update([
                'user_image' => $user_image,
            ]);

        }

      


        $user->update([
            'name' => $request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
        ]);

        Session::flash('update','The Informations Updated Successfuly !');


        return redirect()->route('admin.profile');


        



    }

    public function Password_update(Request $request)
    {


        $request->validate([
            'old_password'=> 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        

        $user = Admin::find(Auth::user()->id);
        $mypass = Auth::user()->password;
        if(Hash::check($request->old_password,$mypass)){

            if(!Hash::check($request->password,$mypass)){

                $user->update([
                    'password'=>Hash::make($request->password) 
                ]);

                
                Session::flash('success','Password Updated Successfuly');
                Auth::logout();

                return redirect()->back();






            }
            else{
                Session::flash('error','New Password Can not Be The Old Password!');
                return redirect()->back();
              }





        }
        else{
            Session::flash('error','Old Password Doesnt Matched');
            return redirect()->back();
          }






    }

}


