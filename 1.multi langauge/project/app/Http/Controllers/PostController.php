<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Redirect;
class PostController extends Controller
{
    public function index()
    {
      $posts = Post::get();
      return view('welcome',compact('posts'));
    }

    public function newpost(Request $req)
    {
      $post = new Post();
      $post->title = serialize($req->title);
      $post->body  = serialize($req->body);
      $post->save();
      return Redirect::back();
    }
}
