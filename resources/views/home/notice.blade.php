<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>收消息</title>
</head>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<h1>收消息</h1>
<script>
    ws = new WebSocket('ws://127.0.0.1:9503');
    // var content = prompt("你好！");
    ws.onopen = function(e){
        alert('连接成功！');
    }
    ws.onmessage = function(e){
        //ws.send(content);  //发消息
        var message = e.data;
        alert(message);
    }
</script>
<body>
</body>
</html>
