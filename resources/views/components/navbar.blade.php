<section id="header" class="w-100" style="background: {{$background_color or 'none'}}">
    <nav class="container navbar navbar-expand-sm justify-content-between">
        {{--<button class="navbar-toggler" type="button"--}}
        {{--data-toggle="collapse" data-target="#togglerNav"--}}
        {{--aria-controls="togglerNav" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}
        <a class="navbar-brand text-white font-weight-bold" href="{{route('homepage')}}" style="font-family: 'Pacifico', cursive; font-size: 35px">Mwriter</a>

        <div id="togglerNav" class="justify-content-end"> {{--collapse navbar-collapse--}}
            <div class="navbar" style="padding: 0">
                <a href="" class="nav-item btn border rounded mr-3 text-white font-weight-bold">Login</a>
                <a href="" class="nav-item btn border rounded text-white font-weight-bold">Sign up</a>
            </div>
        </div>
    </nav>
</section>