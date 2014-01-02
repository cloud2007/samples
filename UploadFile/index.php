<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>添加信息</title>
            <link href="css/uploadify.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="scripts/swfobject.js"></script>
            <script type="text/javascript" src="scripts/jquery.uploadify.v2.1.0.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#upfile").uploadify({
                        'uploader'       : 'scripts/uploadify.swf',
                        'script'         : 'upload.php',
                        'cancelImg'      : 'images/cancel.png',
                        'width'          : '110',
                        'height'         : '30',
                        'wmode'          : 'transparent',  //falsh透明
                        'buttonImg'      : 'images/liulan.jpg',
                        'fileDesc'       : '允许上传的文件列表',
                        'fileExt'        : '*.gif;*.jpg;*.bmp;*.png;*.jpeg;*.png',
                        'queueID'        : 'upinfo',
                        'auto'           : true, //自动上传
                        'multi'          : true, //允许上传多个文件
                        //'sizeLimit'      : 86400, //控制上传文件的大小，单位byte
                        'onSelectOnce'   : function(event,data){},
                        'onComplete'	 : function(event, queueID, fileObj, response, data) {
                            alert(response);
                            var json = eval("(" + response + ")");
                            if(json.err != ""){
                                alert(json.err);
                            }else{
                                $('#back').html( json['msg']);
                            }
                        }
                    })

                })
            </script>
    </head>
    <body style="margin:300px 0 0 500px;">
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <input type="file" name="filedate" id="upfile" /><div id="upinfo"></div>
        </form>
        <div id="back"></div>
</html>