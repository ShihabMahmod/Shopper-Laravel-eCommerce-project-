<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user\customer;
use App\Models\comment;
use Session;

class commentController extends Controller
{
    public function commentSubmited(Request $req,$id)
    {
        $user_email = Session()->get('user_email');
        $user = customer::where('email',$user_email)->get()->first();

        $comment = new comment;
        $comment->product_id = $id;
        $comment->user_id = $user->id;
        $comment->parent_id = $req->input('parent_id');
        $comment->comment = $req->input('comment');
        $comment->rating = $req->input('rating');
        //dd($comment->toArray());
        $result = $comment->save();
        return redirect()->back();
    }
}
