<div class="d-flex flex-row justify-content-center">
    @foreach ($topBooks as $item)
        <a href="./book/{{$item->googleId}}" class="d-inline" style=""><img src="{{$item->coverLink}}" class="img-fluid img-thumbnail" style="height: 200px; width: 150px"></a>
    @endforeach
</div>