<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>">
    <title>学生成绩信息</title>
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/show-grade.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="course">
            <h2>学生的成绩</h2>
            <table>
                <tr>
                    <td>课程</td>
                    <td>分数</td>
                </tr>

                <?php foreach ($grade_list as $grade){?>
                    <tr>
                        <td><?php echo $grade->courseName?></td>
                        <td><?php echo $grade->grade?></td><br>
                    </tr>

                <?php }?>
            </table>
        </div>
    </div>

    <?php include 'footer.php'?>

</div>


</body>
</html>