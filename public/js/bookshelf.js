$(document).ready(function () {
    $('#reading-btn').click(function () {
        //Hide all bookshelves
        $('#planning').addClass('d-none');
        $('#wishlist').addClass('d-none');
        $('#completed').addClass('d-none');

        //Show only reading bookshelf
        $('#reading').removeClass('d-none');
    });

    $('#planning-btn').click(function () {
        //Hide all bookshelves
        $('#reading').addClass('d-none');
        $('#wishlist').addClass('d-none');
        $('#completed').addClass('d-none');

        //Show only reading bookshelf
        $('#planning').removeClass('d-none');
    });

    $('#completed-btn').click(function () {
        //Hide all bookshelves
        $('#planning').addClass('d-none');
        $('#wishlist').addClass('d-none');
        $('#reading').addClass('d-none');

        //Show only reading bookshelf
        $('#completed').removeClass('d-none');
    });

    $('#wishlist-btn').click(function () {
        //Hide all bookshelves
        $('#planning').addClass('d-none');
        $('#reading').addClass('d-none');
        $('#completed').addClass('d-none');

        //Show only reading bookshelf
        $('#wishlist').removeClass('d-none');
    });
});