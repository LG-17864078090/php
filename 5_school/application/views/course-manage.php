<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程管理</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/course-manage.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'?>
        <div class="main">
            <div class="course">
                <h2>课程管理</h2>

                <table>
                    <tr class="row t-header">
                        <td>课程名</td>
                        <td>课程编号</td>
                        <td>上课地点</td>
                        <td>授课老师</td>
                        <td>上课时间</td>
                        <td class="final-td">操作</td>
                    </tr>

                    <?php foreach ($course_list as $course){?>
                        <tr class="row">
                            <td><?php echo $course->courseName?></td>
                            <td><?php echo $course->courseID?></td>
                            <td><?php echo $course->classroomNum?></td>
                            <td><?php echo $course->name?></td>
                            <td><?php echo $course->startweek?> - <?php echo $course->endweek?>周</td>
                            <td class="final-td"><button class="deleteCourse">删除</button></td>
                        </tr>
                    <?php }?>

                    <tr class="row add">
                        <td><input type="text" class="courseName"></td>
                        <td><input type="number" class="courseID"></td>
                        <td><input type="text" class="classroomNum"></td>
<!--                        <td><input type="text" class="teacherID"></td>-->
                        <td>
                            <select name="" id="teacherID">
                                <?php foreach ($teacher_list as $teacher){?>
                                    <option value="<?php echo $teacher->teacherID?>"><?php echo $teacher->name?></option>
                                <?php }?>

                            </select>
                        </td>
                        <td><input type="number" class="startweek"> - <input type="number" class="endweek"></td>
                        <td class="final-td"><button class="saveCourse">保存</button></td>
                    </tr>
                </table>


                <p class="total">已找到共 <?php echo $course->num?> 条课程</p>

                <button class="addButton">添加课程</button>
            </div>
        </div>
        <div class="footer">© 学生学情管理系统</div>
    </div>

    <script src="js/jquery-1.12.4.js"></script>
    <script>
        $('.addButton').on('click',function () {;
            $('.add').css({"display":"flex"});
        });
        $('.deleteCourse').on('click',function () {;
            $.get('user/delete_course/<?php echo $course->courseID?>',{
            },function (data) {
                if(data == 'success'){
                    location.href = 'welcome/course_manage';
                }else if(data == 'fail'){
                    alert('删除失败');
                }
            },'text')
        });

        $('.saveCourse').on('click',function () {
            var flag = true;
            var courseName = $('.courseName').val();
            var courseID = $('.courseID').val();
            var classroomNum = $('.classroomNum').val();
            var teacherID = $('#teacherID').val();
            var startweek = $('.startweek').val();
            var endweek = $('.endweek').val();
            if(courseID == ''){
                flag = false;
                alert('请输入课程编号');
            }else if(startweek>endweek){
                flag = false;
                alert('上课周数有误');
            }
            if(flag){
                $.get('user/courseID_check',{
                    courseID:courseID
                },function (data) {
                    if(data =='success'){
                        alert('该课号已存在')
                    }else if(data == 'fail'){
                        $.get('user/add_course',{
                            courseName:courseName,
                            courseID:courseID,
                            classroomNum:classroomNum,
                            teacherID:teacherID,
                            startweek:startweek,
                            endweek:endweek

                        },function (data) {
                            if(data == 'success'){
                                location.href = 'welcome/course_manage';
                            }
                        },'text')
                    }
                });
            }
        })
    </script>
</body>
</html>