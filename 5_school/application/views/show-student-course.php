<?php $user = $this->session->userdata('user')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的课程</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/show-student-course.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="course">
            <h2>我的修读课程</h2>
            <table>
                <tr class="row t-header">
                    <td>课程名</td>
                    <td>课程编号</td>
                    <td>上课地点</td>
                    <td>授课老师</td>
                    <td>周次</td>
                    <td class="time">上课时间</td>
                    <td class="final-td">操作</td>
                </tr>
                <?php foreach ($my_course_list as $my_course){?>
                    <tr class="row">
                        <td><?php echo $my_course->courseName?></td>
                        <td><?php echo $my_course->courseID?></td>
                        <td><?php echo $my_course->classroomNum?></td>
                        <td><?php echo $my_course->name?></td>
                        <td><?php echo $my_course->week?></td>
                        <td class="time"><?php echo $my_course->starttime?> - <?php echo $my_course->endtime?></td>
                        <td class="final-td"><button onclick="cancelChoose(<?php echo $my_course->courseID?>)">退选</button></td>
                    </tr>
                <?php }?>
            </table>

            <p class="total">共 <?php echo count($my_course_list)?>条课程</p>


            <br>


        </div>
    </div>
    <?php include 'footer.php'?>
</div>

<script src="js/jquery-1.12.4.js"></script>
<script>

    //function choose(courseID) {
    //    $.get('user/check_choose',{
    //        courseID:courseID,
    //        studentID:<?php //echo $user->studentID?>
    //    },function (data) {
    //        if(data == 'success'){
    //            alert('该门课程您已选！')
    //
    //        }else if(data == 'fail'){
    //            $.get('user/choose_course',{
    //                courseID:courseID,
    //                studentID:<?php //echo $user->studentID?>
    //            },function (data) {
    //                if(data == 'success'){
    //                    alert('选课成功');
    //                    location.reload();
    //                }
    //            },'text')
    //        }
    //    });
    //}

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