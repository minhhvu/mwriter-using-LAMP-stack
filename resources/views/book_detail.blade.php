@extends('layouts.root')

@section('head_extra')
@endsection

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <section class="d-flex flex-wrap mt-5 justify-content-center">
        <div class="col-md-3 mb-4" style="">
            <div href="" class="col-sm-2 w-100 mb-3" ><img src="{{$book->coverLink}}" class="rounded"></div>
            <button class="btn btn-info mb-3 w-100">Preview</button>
            @php
                $item = $book;
                $width='w-100';
            @endphp
            @include('components.btn_addToList')
            <form action="" method="get" class="d-none">
                <input type="hidden" name="book" value="{{json_encode($book)}}">
                <button type="button" class="btn btn-info w-100">Add to Your List</button>
            </form>
        </div>
        <div class="col-md-9">
            <h5 href="" class="card-title">{{$book->title}}</h5>
            <h6 class="card-text mb-4">by {{implode(' ',$book->authors)}}</h6>
            <p class="card-text mb-4">{!! str_replace('<br>',' ',$book->description) !!}</p>
        </div>
    </section>
@endsection