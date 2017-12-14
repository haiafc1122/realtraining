var socket;

$(function() {

    $('#message_notify').on('click', 'li.message-link', function(e) {
        $(this).remove();
        var count = $('.count_message').html();
        $('.count_message').html(--count);
    });

    var logged_user = getCookie('logged_user');

    if (logged_user) {
        var socket = io.connect('http://localhost:8890');
        //socket.emit('register_id', { user_id:logged_user });

        socket.on('notify_new_message', function(data) {
            var receiverId = data.from_id;
            var receiverUsername = data.from_name;
            if (!$('#link' + receiverId).length) {
                $('#message_notify').prepend('<li class="message-link" id="link' + receiverId + '">'+
                    '<a href="/chat/' + receiverId + '">New message from ' + receiverUsername + '</a></li>');
                var count_message = $('.count_message').html();
                $('.count_message').html(++count_message);
            } else {
                $('#link' + receiverId).prependTo('#message_notify');
            }
        });
    }
});

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split('; ');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}