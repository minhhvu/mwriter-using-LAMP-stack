<div class="mr-2">
    <input type="hidden" name="book" value="{{json_encode($item)}}">
    <div class="btn btn-info dropdown-toggle" role="button" id="dropdownMoveto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Move to
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMoveto">
        <form action="bookshelf/move" method="post">
            @csrf
            <input type="hidden" value="{{$item->id}}" name="bookId">
            <input type="hidden" value="1" name="bookshelfTypeId">
            <button type="submit" class="dropdown-item">Reading</button>
        </form>
        <form action="bookshelf/move" method="post">
            @csrf
            <input type="hidden" value="{{$item->id}}" name="bookId">
            <input type="hidden" value="2" name="bookshelfTypeId">
            <button type="submit" class="dropdown-item">Completed</button>
        </form>
        <form action="bookshelf/move" method="post">
            @csrf
            <input type="hidden" value="{{$item->id}}" name="bookId">
            <input type="hidden" value="3" name="bookshelfTypeId">
            <button type="submit" class="dropdown-item">Planning</button>
        </form>
        <form action="bookshelf/move" method="post">
            @csrf
            <input type="hidden" value="{{$item->id}}" name="bookId">
            <input type="hidden" value="4" name="bookshelfTypeId">
            <button type="submit" class="dropdown-item">Wishlist</button>
        </form>

        {{--<a class="dropdown-item" href="bookshelf/{{$item->id }}/1">Reading</a>--}}
        {{--<a class="dropdown-item" href="bookshelf/{{$item->id }}/3">Planning</a>--}}
        {{--<a class="dropdown-item" href="bookshelf/{{$item->id }}/2">Completed</a>--}}
        {{--<a class="dropdown-item" href="bookshelf/{{$item->id }}/4">Wishlist</a>--}}
    </div>
</div>