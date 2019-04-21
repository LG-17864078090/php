<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>个人信息</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/show-info.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="info">
            <h3>基本信息</h3>
            <table>
                <tr>
                    <td>学号:</td>
                    <td><?php echo $student->studentID?></td>
                </tr>
                <tr>
                    <td>姓名:</td>
                    <td><?php echo $student->name?></td>
                </tr>
                <tr>
                    <td>性别:</td>
                    <td><?php echo $student->sex?></td>
                </tr>
                <tr>
                    <td>班主任:</td>
                    <td><?php echo $teacher->name?></td>
                </tr>
                <tr>
                    <td>手机号:</td>
                    <td><?php echo $student->phone?></td>
                </tr>
                <tr>
                    <td>家庭住址:</td>
                    <td><?php echo $student->address?></td>
                </tr>

            </table>

            <div class="change-info">
                <button>信息更改</button>
            </div>


        </div>




    </div>

    <div class="footer">© 学生学情管理系统</div>

</div>


</body>
</html>