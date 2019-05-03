<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>班级学生课程管理</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/my-student.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'?>
        <div class="main">
            <div class="user">

                <h2>学生</h2>
                <?php if ( count($my_student_list) ){?>
                    <table>
                        <tr class="row t-header">
                            <td>学号</td>
                            <td>姓名</td>
                            <td>性别</td>
                            <td>手机号</td>
                            <td>住址</td>
                            <td class="final-td">课程</td>
                        </tr>

                        <?php foreach ($my_student_list as $student){?>
                            <tr class="row">
                                <td><?php echo $student->studentID?></td>
                                <td><?php echo $student->name?></td>
                                <td><?php echo $student->sex?></td>
                                <td><?php echo $student->phone?></td>
                                <td><?php echo $student->address?></td>
                                <td class="final-td show-course">
                                    <?php foreach ($course_list as $course){?>
                                        <input type="checkbox" value="<?php echo $course->courseID?>" <?php foreach ($grade_list as $grade){
                                                                                                                if(($grade->sID == $student->studentID)&&($grade->cID == $course->courseID)){
                                                                                                                    echo 'checked = "checked"';
                                                                                                                }
                                                                                                            }?> onclick="change(<?php echo$student->studentID?>,<?php echo $course->courseID?>,this)">
                                        <span><?php echo $course->courseID?> <?php echo $course->courseName?> </span>
                                        <br>
                                    <?php }?>
                                </td>
                            </tr>


                        <?php }?>
                    </table>
                    <p class="total">已找到共 <?php echo count($my_student_list)?> 条</p>
                <?php }else{?>
                    <h4>暂无学生用户</h4>
                <?php }?>


            </div>
        </div>
        <?php include 'footer.php'?>
    </div>

    <script src="js/jquery-1.12.4.js"></script>
    <script>
        function change(sID,cID,e) {
            if(e.checked == true){
                //选课
                $.get('user/choose_course',{
                    sID:sID,
                    cID:cID
                },function (data) {
                    if(data == 'success'){
                        alert('选课成功！');
                        location.reload();
                    }else if(data == 'fail'){
                        alert('选课失败！');
                    }
                },'text')

            }else{
                //取消选课
                $.get('user/cancel_choose_course',{
                    sID:sID,
                    cID:cID
                },function (data) {
                    if(data == 'success'){
                        alert('退选成功！');
                        location.reload();
                    }else if(data == 'fail'){
                        alert('退选失败！');
                    }
                },'text')
            }
        }




    </script>
</body>
</html>