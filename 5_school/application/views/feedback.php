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
            <button class="submit" id="submitButton">提交该问题</button>
        </div>
    </div>

    <?php include 'footer.php'?>

</div>
<script src="js/jquery-1.12.4.js"></script>
<script>
    $('#submitButton').on('click',function () {

        var problem = $('#problem').val();
        var data = new Date().toLocaleString('chinese', { hour12: false });
        if(problem != ''){
            $.get('user/feedback', {
                problem:problem,
                time:data
            },function (data) {
                if(data == 'success'){
                    location.href = 'welcome/feedback_success';
                }

            },'text')
        }else{
            alert('请输入问题描述！');
        }
    })
</script>


</body>
</html>