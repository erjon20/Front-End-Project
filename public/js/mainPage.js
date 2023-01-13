$(document).ready(function(){
    $('.loadMore').hide();
        if ($('.category-row:hidden').length != 0) {
            $('#loadMore-button').show();
        }
        $('#loadMore-button').on('click', function(e) {
            e.preventDefault();
            $('.loadMore:hidden').slideDown();
                if ($('.loadMore:hidden').length == 0) {
                    $('#loadMore-button').fadeOut('slow');
                }
        });
});
