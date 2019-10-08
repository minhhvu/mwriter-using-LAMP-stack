@extends('layouts.root')

@section('header')
    <div class="h-100" style="width: 100vw; margin: auto; background-image: url('{{URL::asset('images/background.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
        @include('components.navbar')

        <section id="root" class="h-75 d-flex align-content-center flex-wrap">
            <div class="w-100 text-center text-white">
                <h1 class="" style="">TRACK YOUR JOURNEY OF READING BOOKS</h1>
                <p class="">Choose any book from Google Book library and then add, edit or write notes on your digital bookshelf.</p>
                <form action="search" method="GET">
                    <input class="form-control w-50 m-auto rounded-pill" name="search" value="" placeholder="Search a book">
                </form>
            </div>
        </section>
    </div>
@endsection