@extends('layouts.index')

@section('header')
    <nav class="navbar navbar-expand-sm justify-content-between">
        {{--<button class="navbar-toggler" type="button"--}}
                {{--data-toggle="collapse" data-target="#togglerNav"--}}
                {{--aria-controls="togglerNav" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}
        <a class="navbar-brand text-white font-weight-bold" href="#" style="font-family: 'Pacifico', cursive; font-size: 35px">Mwriter</a>

        <div id="togglerNav" class="justify-content-end"> {{--collapse navbar-collapse--}}
            <div class="navbar" style="padding: 0">
                <a href="" class="nav-item btn border rounded mr-3 text-white font-weight-bold">Login</a>
                <a href="" class="nav-item btn border rounded text-white font-weight-bold">Sign up</a>
            </div>
        </div>
    </nav>
@endsection

@section('main')
    <div class="w-100 text-center text-white">
        <h1 class="" style="">TRACK YOUR JOURNEY OF READING BOOKS</h1>
        <p class="">Choose any book from library and then add, edit or write notes on your digital bookshelf.</p>
        <form action="search" method="GET">
            <input class="form-control w-50 m-auto" placeholder="Search a book">
        </form>
    </div>
@endsection