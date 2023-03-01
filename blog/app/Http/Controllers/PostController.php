<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Psy\Util\Str;

class PostController extends Controller
{
    public function index() {

        $posts = Post::latest()
                       ->filter(request(['search', 'category', 'author']))
                       ->paginate(6)->withQueryString();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create() {

        return view('posts.create');
    }

    public function store() {


        $attributes = request()->validate([
           'title' => ['required'],
           'excerpt' => ['required'],
           'body' => ['required'],
           'slug' => ['required', Rule::unique('posts', 'slug')],
           'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = Auth::user()->id;

        Post::create($attributes);

        return redirect('/');
    }
}
