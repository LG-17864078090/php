<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学校信息变更</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/change-school-info.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'?>
        <div class="main">
            <div class="container">
                <h4>学校简介</h4>
                <textarea name="" id="intro" cols="60" rows="10"><?php echo $school_info->intro?></textarea>

                <h4>关于我们</h4>
                <textarea name="" id="about" cols="60" rows="10"><?php echo $school_info->about?></textarea>

                <button id="submitButton">提交修改</button>
            </div>

        </div>
        <?php include 'footer.php'?>

    </div>

    <script src="js/jquery-1.12.4.js"></script>
    <script>
        $('#submitButton').on('click',function () {
            var intro = $('#intro').val();
            var about = $('#about').val();



            $.get('user/change_school_info', {
                id:<?php echo $school_info->id?>,
                intro:intro,
                about:about,
            },function (data) {
                console.log(data);
                if(data == 'success'){
                    location.href = 'welcome/administrator_logined';
                }

            },'text')
        })
    </script>


</body>
</html>