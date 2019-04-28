<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户管理</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/user-manage.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'?>
        <div class="main">
            <div class="user">
                <h2>老师</h2>
                <?php if ( count($teacher_list) ){?>
                    <table>
                        <tr class="row t-header">
                            <td>工号</td>
                            <td>姓名</td>
                            <td>性别</td>
                            <td>手机号</td>
                            <td class="final-td">住址</td>
    <!--                        <td class="final-td">操作</td>-->
                        </tr>
                        <?php foreach ($teacher_list as $teacher){?>
                            <tr class="row">
                                <td><?php echo $teacher->teacherID?></td>
                                <td><?php echo $teacher->name?></td>
                                <td><?php echo $teacher->sex?></td>
                                <td><?php echo $teacher->phone?></td>
                                <td class="final-td"><?php echo $teacher->address?></td>
    <!--                            <td class="final-td">-->
    <!--                                <button >删除</button>-->
    <!--                            </td>-->
                            </tr>
                        <?php }?>
                    </table>
                    <p class="total">已找到共 <?php echo count($teacher_list)?> 条</p>
                <?php }else{?>
                    <h4>暂无老师用户</h4>
                <?php }?>



                <h2>学生</h2>
                <?php if ( count($student_list) ){?>
                    <table>
                        <tr class="row t-header">
                            <td>学号</td>
                            <td>姓名</td>
                            <td>性别</td>
                            <td>手机号</td>
                            <td>住址</td>
                            <td class="final-td">操作</td>
                        </tr>

                        <?php foreach ($student_list as $student){?>
                            <tr class="row">
                                <td><?php echo $student->studentID?></td>
                                <td><?php echo $student->name?></td>
                                <td><?php echo $student->sex?></td>
                                <td><?php echo $student->phone?></td>
                                <td><?php echo $student->address?></td>
                                <td class="final-td"><button onclick="deleteStudent(<?php echo $student->studentID?>)" >删除</button></td>
                            </tr>
                        <?php }?>
                    </table>
                    <p class="total">已找到共 <?php echo count($student_list)?> 条</p>
                <?php }else{?>
                    <h4>暂无学生用户</h4>
                <?php }?>





                <h2>家长</h2>
                <?php if ( count($parent_list) ){?>
                    <table>
                        <tr class="row t-header">
                            <td>学生学号</td>
                            <td>姓名</td>
                            <td>性别</td>
                            <td>手机号</td>
                            <td>住址</td>
                            <td class="final-td">操作</td>
                        </tr>

                        <?php foreach ($parent_list as $parent){?>
                            <tr class="row">
                                <td><?php echo $parent->childID?></td>
                                <td><?php echo $parent->name?></td>
                                <td><?php echo $parent->sex?></td>
                                <td><?php echo $parent->phone?></td>
                                <td><?php echo $parent->address?></td>
                                <td class="final-td"><button onclick="deleteParent(<?php echo $parent->childID?>)" >删除</button></td>
                            </tr>
                        <?php }?>
                    </table>
                    <p class="total">已找到共 <?php echo count($parent_list)?> 条</p>
                <?php }else{?>
                    <h4>暂无家长用户</h4>
                <?php }?>

            </div>
        </div>
        <?php include 'footer.php'?>
    </div>

    <script src="js/jquery-1.12.4.js"></script>
    <script>

        // function deleteTeacher(ID){
        //     $.get('user/delete_teacher',{
        //         ID:ID
        //     },function (data) {
        //         if(data == 'success'){
        //             alert('删除成功！');
        //             location.href = 'welcome/user_manage';
        //         }else if(data == 'fail'){
        //             alert('删除失败！');
        //         }
        //     },'text')
        // }

        function deleteStudent(ID){
            $.get('user/delete_student',{
                ID:ID
            },function (data) {
                if(data == 'success'){
                    alert('删除成功！');
                    location.href = 'welcome/user_manage';
                }else if(data == 'fail'){
                    alert('删除失败！');
                }
            },'text')
        }

        function deleteParent(ID){
            $.get('user/delete_parent',{
                ID:ID
            },function (data) {
                if(data == 'success'){
                    alert('删除成功！');
                    location.href = 'welcome/user_manage';
                }else if(data == 'fail'){
                    alert('删除失败！');
                }
            },'text')
        }

    </script>
</body>
</html>