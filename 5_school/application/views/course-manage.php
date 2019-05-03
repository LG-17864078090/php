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
                        <td>周次</td>
                        <td class="time">上课时间</td>
                        <td class="final-td"></td>
                    </tr>

                    <?php foreach ($course_list as $course){?>
                        <tr class="row">
                            <td><?php echo $course->courseName?></td>
                            <td><?php echo $course->courseID?></td>
                            <td><?php echo $course->classroomNum?></td>
                            <td><?php echo $course->name?></td>
                            <td><?php echo $course->week?></td>
                            <td class="time"><?php echo $course->starttime?> - <?php echo $course->endtime?></td>
                            <td class="final-td"><button onclick="deleteCourse(<?php echo $course->courseID?>)" >删除</button></td>
                        </tr>
                    <?php }?>

                    <tr class="row add">
                        <td><input type="text" class="courseName"></td>
                        <td><input type="number" class="courseID"></td>
                        <td><input type="text" class="classroomNum"></td>

                        <td>
                            <select name="" id="teacherID">
                                <?php foreach ($teacher_list as $teacher){?>
                                    <option value="<?php echo $teacher->teacherID?>"><?php echo $teacher->name?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <select name="" id="week">
                                    <option value="周一">周一</option>
                                    <option value="周二">周二</option>
                                    <option value="周三">周三</option>
                                    <option value="周四">周四</option>
                                    <option value="周五">周五</option>
                                    <option value="周六">周六</option>
                                    <option value="周日">周日</option>
                            </select>
                        </td>
                        <td class="time"><input type="time" class="starttime"> - <input type="time" class="endtime"></td>
                        <td class="final-td"><button class="saveCourse">保存</button></td>
                    </tr>
                </table>

                <p class="total">已找到共 <?php echo count($course_list)?> 条课程</p>

                <button class="addButton">添加课程</button>
            </div>
        </div>
        <?php include 'footer.php'?>
    </div>

    <script src="js/jquery-1.12.4.js"></script>
    <script>
        $('.addButton').on('click',function () {
            $('.add').css({"display":"flex"});
        });

        function deleteCourse(courseID){
            $.get('user/delete_course',{
                courseID:courseID
            },function (data) {
                if(data == 'success'){
                    alert('删除成功！');
                    location.href = 'welcome/course_manage';
                }else if(data == 'fail'){
                    alert('删除失败！');
                }
            },'text')

        }


        $('.saveCourse').on('click',function () {
            var flag = true;
            var courseName = $('.courseName').val();
            var courseID = $('.courseID').val();
            var classroomNum = $('.classroomNum').val();
            var teacherID = $('#teacherID').val();
            var week = $('#week').val();
            var starttime = $('.starttime').val();
            var endtime = $('.endtime').val();

            if(courseID == ''){
                flag = false;
                alert('请输入课程编号！');
            }else if(starttime > endtime){
                flag = false;
                alert('上课时间有误！');
            }
            if(flag){
                $.get('user/courseID_check',{
                    courseID:courseID
                },function (data) {
                    if(data =='success'){
                        alert('该课号已存在！')
                    }else if(data == 'fail'){
                        $.get('user/add_course',{
                            courseName:courseName,
                            courseID:courseID,
                            classroomNum:classroomNum,
                            teacherID:teacherID,
                            week:week,
                            starttime:starttime,
                            endtime:endtime

                        },function (data) {
                            if(data == 'success'){
                                alert('添加成功！');
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