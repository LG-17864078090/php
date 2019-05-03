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
                    <td>周次</td>
                    <td class="final-td">上课时间</td>
                </tr>
                <?php foreach ($my_course_list as $my_course){?>
                    <tr class="row">
                        <td><?php echo $my_course->courseName?></td>
                        <td><?php echo $my_course->courseID?></td>
                        <td><?php echo $my_course->classroomNum?></td>
                        <td><?php echo $my_course->week?></td>
                        <td class="final-td"><?php echo $my_course->starttime?> - <?php echo $my_course->endtime?></td>
                    </tr>
                <?php }?>
            </table>
            <p class="total">共 <?php echo count($my_course_list)?>条课程</p>


            <h2>学生成绩</h2>
            <ul class="course-name-list">
                <?php foreach ($my_course_list as $my_course){?>
                    <li class="" onclick="getStudentGrade(<?php echo $my_course->courseID?>)"><?php echo $my_course->courseName?></li>
                <?php }?>

            </ul>


            <table id="grade">

            </table>
        </div>
    </div>
    <?php include 'footer.php'?>
</div>

<script src="js/jquery-1.12.4.js"></script>

<script>




    $('.course-name-list').on('click',function (e) {
        $(e.target).addClass('active').siblings().removeClass('active');

        e.stopPropagation();
    });

    function getStudentGrade(courseID) {
        $.get('user/get_student_grade',{
            courseID:courseID,
        },function (data) {
            $('#grade').empty();
            if(data.length){
                $('#grade').append("<tr class=\"row\">\n" +
                    "                    <td>姓名</td>\n" +
                    "                    <td>学号</td>\n" +
                    "                    <td>成绩</td>\n" +
                    "                    <td class=\"final-td\"></td>\n" +
                    "                </tr>");

                for(var i=0; i<data.length; i++){
                    $('#grade').append("<tr class=\"row\">\n" +
                        "                    <td>"+ data[i].name +"</td>\n" +
                        "                    <td>"+ data[i].sID +"</td>\n" +
                        "                    <td><input type='number' value='"+ data[i].grade+"' class='grade'></td>\n" +
                        "                    <td class=\"final-td\"><button onclick='changeGrade("+data[i].sID+","+data[i].cID+","+i+")'>保存</button></td>\n" +
                        "                </tr>")
                }
            }else{
                $('#grade').append("<h4>没有选该课程的学生</h4>")
            }


        },'json');
    }


    function changeGrade(sID,cID,i) {
        var aInput = document.getElementsByClassName('grade');
        var grade = aInput[i].value*1;
        if(grade>=0&&grade<=100){
            $.get('user/save_student_grade',{
                cID:cID,
                sID:sID,
                grade:grade
            },function (data) {
                if(data == 'success'){
                    alert('成绩修改成功');
                }else {
                    alert('成绩修改失败');
                }
            });
        }else{
            alert('分数为0---100！')
        }
    }
</script>
</body>
</html>