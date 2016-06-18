<?php // onchange="preImg(this.id, 'imgPre')"
    //Please load this file on a different domain!
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="embedded.js"></script>
    <style>
        body{padding: 46px;}
    </style>
</head>
<body>
<div class="form-horizontal">
    <div class="form-group">
        <label for="logo" class="col-sm-2 control-label">Logo：</label>
        <div class="col-sm-10">
            <input type="text" id="logo" name="logo" class="form-control" placeholder="Click and upload" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="submit" type="submit" class="btn btn-default">提交</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $("#logo").click(function(){
            superUpload(this.id);
        });
    });
</script>
</body>
</html>