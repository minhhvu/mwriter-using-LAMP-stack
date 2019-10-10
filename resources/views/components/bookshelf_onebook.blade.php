<div class="mb-4 col-md-4">
    <a href="./book/{{$item->googleId}}" class="" style=""><img src="{{$item->coverLink}}" class="img-fluid img-thumbnail" style="height: 250px; width: 200px"></a>
    <div class="d-flex flex-row mt-2">
        <a href=""><button class="btn btn-info mb-1 mr-2">Take notes</button></a>

        @include('components.btn_moveTo')
    </div>
</div>