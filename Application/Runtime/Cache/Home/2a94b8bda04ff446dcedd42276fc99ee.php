<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
        <h4 id="h4">百度一下你就知道</h4>
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
            $(function () {
                $('#h4').mouseenter(function () {
                    //<a href="www.baidu.com">
                   var tempwindow=window.open('_blank');
                    tempwindow.location='https://www.baidu.com' ;
                   // alert(1234);
                });
                //alert(1234);
            });
        </script>
</body>

</html>