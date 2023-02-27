<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        $posts = Post::latest()->filter(request(['search', 'category']))->get();

        return view('posts', [
            'posts' => $posts,
            'categories' => Category::all(),
            /*'currentCategory' => Category::firstWhere('slug', request('category'))*/
            'currentCategory' => Category::where('slug', request('category'))->first()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}
