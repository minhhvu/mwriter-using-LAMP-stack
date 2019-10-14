<form action="{{route('store_book')}}" method="post">
    @csrf
    <input type="hidden" name="book" value="{{json_encode($item)}}">
    <button type="submit" class="btn btn-info {{$width or ''}}" <?php if (!Auth::check()) echo 'disabled';?>>Add to Your List</button>
</form>