@extends('master')

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="{{ asset('css/comment.css') }}" rel="stylesheet">

@section('content')
    <div class="col-sm-8 blog-main">
        {{--Comments--}}
        <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->created_at->diffForHumans() }} by <a href="#">{{$post->user->name}}</a>
            </p>
            <p>{{$post->body}}</p>
        </div>
        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <div class='container'>
                <div class="col-sm-7 blog-main">
                    <div class="media comment-box">
                        <div class="media-left">
                            <a href="#">
                                <img class="img-responsive user-photo"
                                     src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">{{$comment->user->name}}</a></h4>
                            <p><strong>{{$comment->created_at->diffForHumans()}}</strong> <br>
                                {{$comment->body}}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
        @if(Auth::check())
            <div class="card">
                <div class="card-block">
                    <form action="/post/{{$post->id}}/comments" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="body" id="" placeholder="You comment here" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                        @include('layouts.errors')
                    </form>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-block">
                    You need o be logged in to comment on posts... <a href="{{route('login')}}">Login</a>
                </div>
            </div>
        @endif
    </div><!-- /blog-main -->
@endsection