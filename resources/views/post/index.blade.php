@extends ('master')
{{--@guest
{{redirect(route('login'))}}
@else--}}
@section ('content')
    <div class="col-sm-8 blog-main">
        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"> <a href="/post/{{$post->id}}">{{$post->title}}</a></h2>
                <p class="blog-post-meta">{{$post->created_at->diffForHumans() }} by <a href="#">{{$post->user->name}}</a></p>
                <p>{{$post->body}}</p>
            </div>
        @endforeach
    </div><!-- /.blog-main -->

@endsection
{{--@endguest--}}
