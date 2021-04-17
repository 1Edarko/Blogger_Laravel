<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class UserCrtl extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all();
        return view('admin.users.show' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));

    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $request->validate([

            'name' => 'required',
            'email' =>'required|unique:admins',
            'password' => 'required|confirmed',
             'phone' =>'required',
            'user_image'=>'required',
            
           

         ]);

         if($request->hasFile('user_image')){
            $r_image = $request->file('user_image');
            $user_image = time(). '.' . $r_image->getClientOriginalExtension();
            $path = public_path('admin/users_imgs');
            $r_image->move($path ,$user_image);
 
        }


          $user = Admin::create([ 

          'name' => $request->name,
          'email' =>$request->email,
          'password' => Hash::make($request->password),
          'phone' =>$request->phone,
          'user_image' => $user_image,
        

          
          ]);

          $user->roles()->sync($request->roles);

          Session::flash('success','User Added Successfuly !');

        return redirect()->route('users.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::with('roles')->find($id);

        $roles = Role::all();

        return view('admin.users.edit' , compact('user' , 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([

            'name' => 'required',
            'email' =>'required',
            'password' =>'required',
            'phone' =>'required',
            'job '=> 'required',
            'about_me' =>'required',

         ]);

         if($request->hasFile('user_image')){
            $r_image = $request->file('user_image');
            $user_image = time(). '.' . $r_image->getClientOriginalExtension();
            $path = public_path('admin/users_imgs');
            $r_image->move($path ,$user_image);
 
        }

         $user = Admin::find($id);

          $user->update([

            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'phone' =>$request->phone,
        //     'job' => $request->job,
        //     'user_image' => $user_image,
        //    'about_me' => $request->about_me,



          ]);

          $user->roles()->sync($request->roles);

          Session::flash('Updated','User Updated Successfuly !');

        return redirect()->route('users.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id' , $id)->delete();


        Session::flash('deleted','User Has Been Deleted !');

        return redirect()->route('users.index');
    }
}
