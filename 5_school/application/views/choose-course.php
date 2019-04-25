<?php $user = $this->session->userdata('user')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选课中心</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/choose-course.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="course">
            <h2>我的已选课程</h2>
            <table>
                <tr class="row t-header">
                    <td>课程名</td>
                    <td>课程编号</td>
                    <td>上课地点</td>
                    <td>授课老师</td>
                    <td>节次</td>
                    <td>上课时间</td>
                    <td class="final-td">操作</td>
                </tr>
                <?php foreach ($my_course_list as $my_course){?>
                    <tr class="row">
                        <td><?php echo $my_course->courseName?></td>
                        <td><?php echo $my_course->courseID?></td>
                        <td><?php echo $my_course->classroomNum?></td>
                        <td><?php echo $my_course->name?></td>
                        <td><?php echo $my_course->starttime?> - <?php echo $my_course->starttime+1?>节 </td>
                        <td><?php echo $my_course->startweek?> - <?php echo $my_course->endweek?>周</td>
                        <td class="final-td"><button onclick="cancelChoose(<?php echo $my_course->courseID?>)">退选</button></td>
                    </tr>
                <?php }?>
            </table>

            <p class="total">共 <?php echo count($my_course_list)?>条课程</p>


            <br>

            <h2>全部课程</h2>
            <table>
                <tr class="row t-header">
                    <td>课程名</td>
                    <td>课程编号</td>
                    <td>上课地点</td>
                    <td>授课老师</td>
                    <td>节次</td>
                    <td>上课时间</td>
                    <td class="final-td">操作</td>
                </tr>

                <?php foreach ($course_list as $course){?>
                    <tr class="row">
                        <td><?php echo $course->courseName?></td>
                        <td><?php echo $course->courseID?></td>
                        <td><?php echo $course->classroomNum?></td>
                        <td><?php echo $course->name?></td>
                        <td><?php echo $course->starttime?> - <?php echo $course->starttime+1?>节 </td>
                        <td><?php echo $course->startweek?> - <?php echo $course->endweek?>周</td>
                        <td class="final-td"><button onclick="choose(<?php echo $course->courseID?>)">选课</button></td>
                    </tr>
                <?php }?>
            </table>
            <p class="total">共 <?php echo count($course_list)?> 条课程</p>
        </div>
    </div>
    <?php include 'footer.php'?>
</div>

<script src="js/jquery-1.12.4.js"></script>
<script>

    function choose(courseID) {
        $.get('user/check_choose',{
            courseID:courseID,
            studentID:<?php echo $user->studentID?>
        },function (data) {
            if(data == 'success'){
                alert('该门课程您已选！')

            }else if(data == 'fail'){
                $.get('user/choose_course',{
                    courseID:courseID,
                    studentID:<?php echo $user->studentID?>
                },function (data) {
                    if(data == 'success'){
                        alert('选课成功');
                        location.reload();
                    }
                },'text')
            }
        });
    }

    function cancelChoose(courseID) {
        $.get('user/cancel_choose_course',{
            courseID:courseID,
            studentID:<?php echo $user->studentID?>
        },function (data) {
            if(data == 'success'){
                alert('退选成功！');
                location.reload();
            }else if(data == 'fail'){
                alert('退选失败！');
            }
        })


    }


</script>
</body>
</html>