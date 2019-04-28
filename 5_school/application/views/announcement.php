<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>发布公告</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/announcement.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'?>
        <div class="main">
            <div class="container">
                <h4>标题</h4>
                <input type="text" class="title" value=""><br>

                <h4>内容</h4>
                <textarea name="" class="content" cols="60" rows="10"></textarea>

                <button class="submit">发布公告</button>
            </div>
        </div>
        <?php include 'footer.php'?>
    </div>

    <script src="js/jquery-1.12.4.js"></script>
    <script>

        $('.submit').on('click',function () {
            var title = $('.title').val();
            var content = $('.content').val();
            var data = new Date().toLocaleString('chinese', { hour12: false });
            var flag = true;
            if(title == ''){
                alert('请输入标题');
                flag = false;
            }else if(content == ''){
                alert('请输入内容');
                flag = false;
            }
            if(flag){
                $.get('user/announce',{
                    title:title,
                    content:content,
                    time:data
                },function (data) {
                    if(data=='success'){
                        alert('发布成功');
                        location.href = 'welcome/index'
                    }
                },'text')
            }
        });
    </script>
</body>
</html>