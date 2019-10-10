<div class="mr-2">
    <input type="hidden" name="book" value="{{json_encode($item)}}">
    <div class="btn btn-info dropdown-toggle" role="button" id="dropdownMoveto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Move to
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMoveto">
        <a class="dropdown-item" href="bookshelf/{{$item->id }}/1">Reading</a>
        <a class="dropdown-item" href="bookshelf/{{$item->id }}/3">Planning</a>
        <a class="dropdown-item" href="bookshelf/{{$item->id }}/2">Completed</a>
        <a class="dropdown-item" href="bookshelf/{{$item->id }}/4">Wishlist</a>
    </div>
</div>