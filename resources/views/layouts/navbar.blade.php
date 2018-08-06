<div class="blog-masthead">
    <div class="container">
        <nav class=" blog-nav ">
            <div class="blog-nav-group">

                <a class="blog-nav-item active" href="/">Home</a>
                @if(Auth::check())
                <a class="blog-nav-item" href="/post/create">Create a new Post</a>
                @endif
                <a class="blog-nav-item" href="#">Press</a>
                <a class="blog-nav-item" href="#">New hires</a>
            </div>

            @guest
            <div>
                <a class="blog-nav-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="blog-nav-item" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
            @else
                    <a id="navbarDropdown" class="blog-nav-item  dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest

                {{--@if(!Auth::check())
                    <a class="blog-nav-item" href="{{ route('login') }}">Login</a>
                @endif
                @if(Auth::check())
                    <div class="dropdown show">
                        <a class="blog-nav-item  dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                @endif--}}
        </nav>
    </div>
</div>