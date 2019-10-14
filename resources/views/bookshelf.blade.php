@extends('layouts.root')

@section('head_extra')
{{--    <script src="{{URL::asset('js/bookshelf.js')}}"></script>--}}
@endsection

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <section>
        <div class="">
            <div class="navbar mr-auto mb-4 rounded" style="background: papayawhip">
                <ul class="nav">
                    <div class="h4 nav-item font-weight-bold w-100">My bookshelf</div>
                    <li id="reading-btn" class="nav-item"><a class="nav-link" href="#reading">Reading</a></li>
                    <li id="planning-btn" class="nav-item"><a class="nav-link" href="#planning">Planning</a></li>
                    <li id="wishlist-btn" class="nav-item"><a class="nav-link" href="#wishlist">Wishlist</a></li>
                    <li id="completed-btn" class="nav-item"><a class="nav-link" href="#completed">Completed</a></li>
                </ul>
            </div>

            <div id="reading" class="mb-5">
                <div class="h5 mb-3">Books you are reading:</div>
                <div class="d-flex flex-row flex-wrap">
                    @foreach($readingBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

            <div id="planning" class="mb-5">
                <div class="h5 mb-3">Books you plan to read:</div>
                <div class="d-flex flex-row flex-wrap">
                    @foreach($planningBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

            <div id="wishlist" class="mb-5">
                <div class="h5 mb-3">Wishlist Books:</div>
                <div class="d-flex flex-row flex-wrap">
                    @foreach($wishlistBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

            <div id="completed" class="mb-5">
                <div class="h5 mb-3">Books you had completed:</div>
                <div class="d-flex flex-row flex-wrap">
                    @foreach($completedBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

        </div>

    </section>
@endsection

@section('footer')
@endsection