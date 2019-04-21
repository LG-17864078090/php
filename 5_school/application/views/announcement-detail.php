
<?php $user_work = $this->session->userdata('user_work')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>公告详情</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/announcement-detail.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="list">
            <h4 style="padding-left: 8px">列表</h4>
            <?php foreach ($announce_list as $announcement){?>
                <li class="list-item">
                    <a href="welcome/announcement_detail/<?php echo $announcement->id;?>" class="list-title"><?php echo $announcement->title?></a>
                    <?php if($user_work == 'administrator'){?>
                        <button class="list-delete" onclick="deleteAnnounce(<?php echo $announcement->id?>)">删除</button>
                    <?php }?>
                </li>
            <?php }?>

        </div>
        <div class="container">
            <div class="change">
                <?php if(isset($prev)){?>
                    <button class="pre"><a href="welcome/announcement_detail/<?php echo $prev->id;?>">上一篇</a></button>
                <?php }?>
                <h1 class="title"><?php echo $announce->title?></h1>

                <?php if(isset($next)){?>
                    <button class="next"><a href="welcome/announcement_detail/<?php echo $next->id;?>">下一篇</a></button>
                <?php }?>
            </div>
            <p class="time"><?php echo $admin->name?>发表于<?php echo $announce->time?></p>
            <p class="content"><?php echo $announce->content?></p>
        </div>
        <div class="right"></div>
    </div>

    <div class="footer">© 学生学情管理系统</div>

</div>
<script src="js/jquery-1.12.4.js"></script>
<script>
    function deleteAnnounce(announce_id) {
        console.log(announce_id);
        $.get('user/delete_announce',{
            announce_id:announce_id
        },function (data) {
            if(data == 'success'){
                alert('删除成功');
                if(announce_id == <?php echo $announce->id?>){
                    <?php if(!isset($next)&&!isset($prev)){?>
                        location.href = 'welcome/index';
                    <?php }elseif (!isset($next)){?>
                        location.href = 'welcome/announcement_detail/<?php echo $prev->id?>';
                    <?php }elseif (!isset($prev)){?>
                        location.href = 'welcome/announcement_detail/<?php echo $next->id?>';
                    <?php }?>

                }else{
                    location.reload();
                }



            }

        },'text')

    }
</script>
</body>
</html>