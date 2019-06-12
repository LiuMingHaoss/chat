<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <title>Document</title>
</head>
<body>


<div id="message-send">
    <!--这里填写对话内容，并发送-->
    <input type="textarea" id="message-box"/>
    <input type="button" id="submit-message" value="发送消息">
    <hr>
    <div id="message-list">
        <!--这里显示对话内容-->

    </div>
</div>
</body>
</html>
<script>
    var ws_server='ws://vm.socket.com:9502/';
    var ws=new WebSocket(ws_server);
    ws.onopen=function(){
        $(document).keyup(function(event){
            if(event.keyCode ==13){
                $("#submit-message").trigger("click");
            }
        });
        $('#submit-message').click(function(){
            var content=$('#message-box').val();
            ws.send(content);

            ws.onmessage=function(d){
                // console.log(d.data)
                var p='<p>'+d.data+'</p>'
                $('#message-list').append(p);

            }
        })

    }


    console.log(ws);
</script>