@extends('layouts.root')

@section('head_extra')
    <script src="{{URL::asset('js/bookshelf.js')}}"></script>
@endsection

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <section>
        <div class="">
            <div class="navbar mr-auto mb-4">
                <ul class="nav">
                    <div class="nav-item w-100"><a class="nav-link">My bookshelf</a></div>
                    <li id="reading-btn" class="nav-item"><a class="nav-link">Reading</a></li>
                    <li id="completed-btn" class="nav-item"><a class="nav-link">Completed</a></li>
                    <li id="planning-btn" class="nav-item"><a class="nav-link">Planning</a></li>
                    <li id="wishlist-btn" class="nav-item"><a class="nav-link">Wishlist</a></li>
                </ul>
            </div>

            <div id="reading">
                <div class="d-flex flex-row flex-wrap justify-content-center">
                    @foreach($readingBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

            <div id="completed" class="d-none">
                <div class="d-flex flex-row flex-wrap justify-content-center">
                    @foreach($completedBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

            <div id="planning" class="d-none">
                <div class="d-flex flex-row flex-wrap justify-content-center">
                    @foreach($planningBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

            <div id="wishlist" class="d-none">
                <div class="d-flex flex-row flex-wrap justify-content-center">
                    @foreach($wishlistBooks as $item)
                        @include('components.bookshelf_onebook')
                    @endforeach
                </div>
            </div>

        </div>

    </section>
@endsection

@section('footer')
@endsection