<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller {
    //

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        $posts = Post::latest()->filter(request(['month', 'year']))->get(); //using scopeQuery filter


        return view('post.index', compact('posts'));
    }

    public function create() {
        return view('post.create');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function store() {
        /* dd(request()->all());*/
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->user()->id
        ]);
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        //Post::create(request(['title','body']));
        return redirect('/');
    }
}
