<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

class CommentsCrtl extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request){

        Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,

        ]);

        return back();



    }
}
