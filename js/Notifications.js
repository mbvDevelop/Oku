function addmsg(msg){
    $('#notification').text(msg);
}

function waitForMsg(){
    $.ajax({
        type: 'GET',
        url: 'countNotifications.php',
        async: true,
        cache: false,
        timeout: 50000,
        success: function(data){
            addmsg(data);
            setTimeout(
                waitForMsg,
                1000
            );
        }
    })
}

$(document).ready(function() {
    waitForMsg();
});