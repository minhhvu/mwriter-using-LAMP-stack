@extends('layouts.root')

@section('head_extra')
@endsection

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <section class="container" style="max-width: 700px">
        <div class="p-2 mt-4 mb-4 rounded" style="background: papayawhip">
            <h4 class="font-weight-bold">Search</h4>
            <form action="search" method="GET">
                <input class="form-control rounded-pill" name="search" value="{{$keywords}}">
            </form>
        </div>

        <div>
            @foreach($books as $item)
                <div class="d-flex flex-wrap mb-4">
                    <a href="book/{{$item->id}}" class="col-sm-2" ><img src="{{$item->coverLink}}" class="img-fluid img-thumbnail"></a>
                    <div class="col-sm-10" style="">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <h6 class="card-text">by {{implode(' ',$item->authors)}}</h6>
                        <p class="card-text">{!! str_replace('<br>','',$item->textSnippet) !!}</p>
                        <form action="" method="get">
                            <input type="hidden" name="book" value="{{json_encode($item)}}">
                            <button type="button" class="btn btn-info">Add to Reading List</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('footer')
@endsection