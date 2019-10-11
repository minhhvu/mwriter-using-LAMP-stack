@extends('layouts.root')

@section('head_extra')
    <script>
        $(document).ready(function () {
            $('#note-input').keyup(function () {
                //Expand the input box to 10 lines
                $('#note-input').attr('rows', '10');

                //Toggle the note-button as user types something
                if ($('#note-input').val()){
                    $('#note-btn').removeClass('d-none');
                } else {
                    $('#note-btn').addClass('d-none');
                }
            });
        });
    </script>
@endsection

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <section>
        {{--Sub navigation bar--}}
        <div class="mb-4 rounded p-2" style="background: papayawhip">
            <div class="font-weight-bold h4 mb-3">Book Notes</div>
            <div class="h5 pb-2">Book title</div>
        </div>

        <form>
            <textarea id='note-input' class="form-control mb-2" name="note-content" rows="4" placeholder="What's in your mind?"></textarea>
            <button id="note-btn" type="submit" class="btn btn-info d-none">Save it</button>
        </form>

        @foreach($notes as $note)
            <div class="mb-4 p-2">
                <h6 class="card-text">{{$note->created_at}}</h6>
                <div class="card-text">{{$note->content}}</div>
            </div>
        @endforeach
    </section>
@endsection