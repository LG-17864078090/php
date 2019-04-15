<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>问题反馈</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/feedback.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="container">
            <h4>问题描述</h4>
            <textarea name="" id="problem" cols="60" rows="10"></textarea>

            <h4>联系方式</h4>
            <input type="text" id="contact-way"><br>

            <button class="submit" id="submitButton">提交该问题</button>

        </div>


    </div>

    <div class="footer">© 学生学情管理系统</div>

</div>
<script src="js/jquery-1.12.4.js"></script>
<script>
    $('#submitButton').on('click',function () {
        $.get('', {},function (data) {location.href = 'welcome/feedback_success';},'text')
    })
</script>


</body>
</html>