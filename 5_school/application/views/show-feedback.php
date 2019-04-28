<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>显示反馈</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/show-feedback.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>

    <div class="main">
        <div class="container">
            <?php foreach ($feedback_list as $feedback){?>
                <div class="list">
                    <div>
                        <span class="username"><?php echo $feedback->feedbackerID?></span>
                        <span class="work">( <?php if($feedback->feedbackerWork == 'student'){
                                echo '学生';
                            }elseif ($feedback->feedbackerWork == 'parent')  {
                                echo '家长';
                            }elseif ($feedback->feedbackerWork == 'teacher')  {
                                echo '老师';
                            }?> )</span>
                        <span class="posttime">反馈于<?php echo $feedback->time?></span>
                    </div>
                    <div class="content">
                        <?php echo $feedback->problem?>
                    </div>
                </div>

            <?php }?>
        </div>

    </div>

    <?php include 'footer.php'?>

</div>


</body>
</html>
