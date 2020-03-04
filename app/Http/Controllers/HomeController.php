<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();

        return view('welcome', ['posts' => $posts]);
    }

    public function show($id)
    {
        //Find the post with the id = $id
        $post = Post::find($id);

        //$comment= Comment::orderBy('id', 'desc')->where('post_id', $id)->get();

        //return view('/show', ['post' => $post , 'comments' => $comment] );
        return view('/show', ['post' => $post] );
    }
}
