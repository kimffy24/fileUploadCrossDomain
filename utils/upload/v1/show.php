<?php
$key = 'targetFile';
if (isset($_GET['key']) && !empty($_GET['key']))
    $key = $_GET['key'];
else if (isset($_GET['k']) && !empty($_GET['k']))
    $key = $_GET['k'];
?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="upload.css">
    <script type="text/javascript" src="ajaxfileupload.min.js"></script>
    <script type="text/javascript">
        //var targetId = "<?php echo $key; ?>";
    </script>
    <script type="text/javascript" src="upload.js"></script>
</head>
<body>
<div class="form-horizontal">
    <div class="form-group">
        <label for="<?php echo $key; ?>" class="col-sm-2 control-label">UploadFile：</label>
        <div class="col-sm-10">
            <input type="file" id="<?php echo $key; ?>" name="<?php echo $key; ?>" class="form-control">
        </div>
    </div>
    <div id="uploadTips" class="uploadHidden">
        <label for="imgPre" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <strong>上传完成！</strong>
        </div>
    </div>
    <div id="imagePreview"  class="uploadHidden" >
        <label for="imgPre" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <img id="imgPre" src="" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="submit" type="submit" class="btn btn-default">提交</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        setNiuBiUpload("<?php echo $key; ?>", "imgPre");
    });
</script>
</body>
</html>