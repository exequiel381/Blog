<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{



    public function store(CommentRequest $request,$id)
    {

        $comment = new Comment();
        $comment->body = request('post_comment');
        $comment->post_id = $id;

        $comment->save();

        return redirect("/home/$id");
    }
}
