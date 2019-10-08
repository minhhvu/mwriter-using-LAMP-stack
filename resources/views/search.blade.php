@extends('layouts.root')

@section('head_extra')
@endsection

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <section>
        <div class="p-2 mt-5 mb-4 rounded" style="background: papayawhip">
            <h4 class="font-weight-bold">Search</h4>
            <form action="search" method="GET">
                <input class="form-control rounded-pill" name="search" value="{{$keywords}}">
            </form>
        </div>

        <div>
            @foreach($books as $item)
                <div class="d-flex flex-wrap mb-4">
                    <a href="./book/{{$item->id}}" class="col-sm-2" ><img src="{{$item->coverLink}}" class="img-fluid img-thumbnail"></a>
                    <div class="col-sm-10" style="">
                        <a href="./book/{{$item->id}}" class="card-title h5">{{$item->title}}</a>
                        <h6 class="card-text">by {{implode(' ',$item->authors)}}</h6>
                        <p class="card-text">{!! str_replace('<br>','',$item->textSnippet) !!}</p>
                        <form action="" method="get" class="d-none">
                            <input type="hidden" name="book" value="{{json_encode($item)}}">
                            <button type="button" class="btn btn-info">Add to Your List</button>
                        </form>
                        @include('components.btn_addToList')
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('footer')
@endsection