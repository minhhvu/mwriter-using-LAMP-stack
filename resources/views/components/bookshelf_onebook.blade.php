<div class="mb-4 col-md-4">
    <a href="./book/{{$item->googleId}}" class="" style=""><img src="{{$item->coverLink}}" class="img-fluid img-thumbnail" style="height: 250px; width: 200px"></a>
    <div class="d-flex flex-row mt-2">
        @include(('components.btn_takeNote'))

        @include('components.btn_moveTo')
    </div>
</div>