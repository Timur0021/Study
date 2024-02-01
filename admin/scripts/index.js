$(document).ready(function() {
    $('.button').click(function() {
        $.post('/admin/user/message', function(data) {
            $('main').html(data);
        }, 'json');
    })
})