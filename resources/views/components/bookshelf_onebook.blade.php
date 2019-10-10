<div class="mb-4 col-md-4">
    <a href="./book/{{$item->googleId}}" class="" style=""><img src="{{$item->coverLink}}" class="img-fluid img-thumbnail" style="height: 250px; width: 200px"></a>
    <div class="d-flex flex-row mt-2">
        <a href=""><button class="btn btn-info mb-1 mr-2">Write notes</button></a>
        <form action="" method="get" class="mr-2">
            <input type="hidden" name="book" value="{{json_encode($item)}}">
            <button type="button" class="btn btn-info">Move to</button>
        </form>
    </div>
</div>