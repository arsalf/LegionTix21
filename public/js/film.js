$(document).ready(function($) {
    $('#manual-btn').on('click', function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $('.manual').css('display', 'none');
        } else {
            $(this).addClass('selected');
            $('.manual').css('display', 'block');
        }
    })
});