$(document).ready(function(){
    // Khởi tạo một đối tượng Pusher với app_key
    var pusher = new Pusher('8079848d1ccfcf14683e', {
        cluster: 'ap1',
        encrypted: true
    });
     //Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
    var channel = pusher.subscribe('notify-channel');
     //Bind một function addMesagePusher với sự kiện DemoPusherEvent
    channel.bind('App\\Events\\NotifyEvent', function(data) {
        var liTag = $("<a href='" + data.link + "''>" + data.notify + "</a>");
        $('#notify-admin').prepend(liTag);
        var count = $('#countNotify').html();
        count++;
        $('#countNotify').html(count);
    });
    
});
