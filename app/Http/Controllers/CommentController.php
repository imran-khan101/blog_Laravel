<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller {
    //
    public function store(Post $post) {

        //Validation
        $this->validate(request(),['body' =>'required']);

        //1s way to post comment

        /*Comment::create([
           'body' => request('body'),
            'post_id' => $post->id
        ]);*/

        //2 using Post model to do the work (easiest)

        $post->addComment(request('body'));

        return back();
    }
}
