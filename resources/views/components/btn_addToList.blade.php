<form action="{{route('store_book')}}" method="post">
    @csrf
    <input type="hidden" name="book" value="{{json_encode($item)}}">
    @if (!Auth::check())
        <button type="submit" class="btn btn-info {{$width or ''}}" disabled>Add to Your List</button>
    @else
        @if ($item->isOnDatabase)
            <button type="submit" class="btn btn-info {{$width or ''}}" disabled>On Bookshelf</button>
        @else
            <button type="submit" class="btn btn-info {{$width or ''}}">Add to Your List</button>
        @endif
    @endif
</form>