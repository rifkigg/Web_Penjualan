<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(4);

        //render view with posts
        return view('home.index', compact('posts'));
    }
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('home.show', compact('post'));
    }
}
