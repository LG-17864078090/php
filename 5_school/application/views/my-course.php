<?php $user = $this->session->userdata('user')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的课程</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/my-course.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="course">
            <h2>我的教授课程</h2>
            <table>
                <tr class="row t-header">
                    <td>课程名</td>
                    <td>课程编号</td>
                    <td>上课地点</td>
                    <td>节次</td>
                    <td>上课时间</td>
                    <td class="final-td">课程人数</td>
                </tr>
                <?php foreach ($my_course_list as $my_course){?>
                    <tr class="row">
                        <td><?php echo $my_course->courseName?></td>
                        <td><?php echo $my_course->courseID?></td>
                        <td><?php echo $my_course->classroomNum?></td>
                        <td><?php echo $my_course->starttime?> - <?php echo $my_course->starttime+1?>节 </td>
                        <td><?php echo $my_course->startweek?> - <?php echo $my_course->endweek?>周</td>
                        <td class="final-td"></td>
                    </tr>
                <?php }?>
            </table>
            <p class="total">共 <?php echo count($my_course_list)?>条课程</p>



            <table>
                <tr class="row">
                    <td>姓名</td>
                    <td>学号</td>
                    <td>成绩</td>
                    <td class="final-td"></td>
                </tr>
                <tr class="row">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="final-td"><a href="">保存</a></td>
                </tr>
            </table>





        </div>
    </div>
    <?php include 'footer.php'?>
</div>

<script src="js/jquery-1.12.4.js"></script>
<script>




</script>
</body>
</html>