<section id="header" class="" style="background-image: url('{{URL::asset('images/background.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
    <nav class="container navbar navbar-expand-sm justify-content-between">
        {{--<button class="navbar-toggler" type="button"--}}
        {{--data-toggle="collapse" data-target="#togglerNav"--}}
        {{--aria-controls="togglerNav" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}
        <a class="navbar-brand font-weight-bold text-white" href="{{route('homepage')}}" style="font-family: 'Pacifico', cursive; font-size: 35px;">Mwriter</a>

        <div id="togglerNav" class="justify-content-end"> {{--collapse navbar-collapse--}}
            <div class="navbar" style="padding: 0">
                @auth
                    <div class="nav-item btn mr-3 text-white font-weight-bold">Welcome {{Auth::user()->name}}</div>
                    <a href="{{route('bookshelf')}}" class="nav-item btn border rounded text-white font-weight-bold mr-3">My bookshelf</a>
                    <a href="/logout/{{urlencode(Request::path().str_replace(Request::url(), '',Request::fullUrl()))}}" class="nav-item btn border rounded text-white font-weight-bold">Logout</a>
                @else
                    <a href="/login" class="nav-item btn border rounded mr-3 text-white font-weight-bold">Login</a>
                    <a href="/register" class="nav-item btn border rounded text-white font-weight-bold">Register</a>
                @endauth
            </div>
        </div>
    </nav>
</section>