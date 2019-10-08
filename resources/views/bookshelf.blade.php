@extends('layouts.root')

@section('head_extra')
@endsection

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <section>
        <div class="">
            <div class="navbar mr-auto mb-4">
                <ul class="nav">
                    <div class="nav-item w-100"><a class="nav-link" href="">My bookshelf</a></div>
                    <li id="reading-shelf" class="nav-item"><a class="nav-link" href="">Reading</a></li>
                    <li id="completed-shelf" class="nav-item"><a class="nav-link" href="">Completed</a></li>
                    <li id="planning-shelf" class="nav-item"><a class="nav-link" href="">Planning</a></li>
                    <li id="wishlist-shelf" class="nav-item"><a class="nav-link" href="">Wishlist</a></li>
                </ul>
            </div>

            <div class="d-flex flex-row flex-wrap justify-content-center">
                @foreach($books as $item)
                    <div class="mb-4 col-md-4">
                        <a href="./book/{{$item->id}}" class="" style=""><img src="{{$item->coverLink}}" class="img-fluid img-thumbnail" style="height: 250px; width: 200px"></a>
                        <div class="d-flex flex-row mt-2">
                            <a href=""><button class="btn btn-info mb-1 mr-2">Write notes</button></a>
                            <form action="" method="get" class="mr-2">
                                <input type="hidden" name="book" value="{{json_encode($item)}}">
                                <button type="button" class="btn btn-info">Move to</button>
                            </form>
                        </div>
                        <div class="col-7 d-none" style="">
                            <a href="./book/{{$item->id}}" class="card-title h5">{{$item->title}}</a>
                            <h6 class="card-text" style="">by {{implode(' ',$item->authors)}}</h6>
                            <p class="card-text" style="max-height: 190px; overflow: hidden">{!! str_replace('<br>','',$item->textSnippet) !!}</p>
                            <div class="d-flex flex-row flex-wrap">
                                <form action="" method="get" class="mr-2">
                                    <input type="hidden" name="book" value="{{json_encode($item)}}">
                                    <button type="button" class="btn btn-info">Move to</button>
                                </form>
                                <a href=""><button class="btn btn-info">Write notes</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class=""></div>

    </section>
@endsection

@section('footer')
@endsection