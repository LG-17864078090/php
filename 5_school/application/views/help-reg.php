<?php $user = $this->session->userdata('user')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>辅助注册</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/commen.css">
    <link rel="stylesheet" href="css/help-reg.css">
</head>
<body>
<div class="wrapper">
    <?php include 'header.php'?>
    <div class="main">
        <div class="help">
            <h2>学生</h2>
            <?php if(count($student_reg_list)){?>
                <table>
                    <tr class="row t-header">
                        <td>姓名</td>
                        <td>学号</td>
                        <td>性别</td>
                        <td>手机号</td>
                        <td>住址</td>
                        <td class="final-td">操作</td>
                    </tr>
                    <?php foreach ($student_reg_list as $student_reg){?>
                        <tr class="row">
                            <td><?php echo $student_reg->name?></td>
                            <td><?php echo $student_reg->studentID?></td>
                            <td><?php echo $student_reg->sex?></td>
                            <td><?php echo $student_reg->phone?></td>
                            <td><?php echo $student_reg->address?></td>
                            <td class="final-td"><button onclick="helpStudent(<?php echo $student_reg->studentID?>)">辅助</button></td>
                        </tr>
                    <?php }?>
                </table>
                <p class="total">共 <?php echo count($student_reg_list)?>条</p>
            <?php }else{?>
                <h4>暂无需要您帮助注册的学生</h4>
            <?php }?>


            <br>

            <h2>家长</h2>
            <?php if(count($parent_reg_list)){?>
                <table>
                    <tr class="row t-header">
                        <td>姓名</td>
                        <td>学生学号</td>
                        <td>性别</td>
                        <td>手机号</td>
                        <td>住址</td>
                        <td class="final-td">操作</td>
                    </tr>
                    <?php foreach ($parent_reg_list as $parent_reg){?>
                        <tr class="row">
                            <td><?php echo $parent_reg->name?></td>
                            <td><?php echo $parent_reg->childID?></td>
                            <td><?php echo $parent_reg->sex?></td>
                            <td><?php echo $parent_reg->phone?></td>
                            <td><?php echo $parent_reg->address?></td>
                            <td class="final-td"><button onclick="helpParent(<?php echo $parent_reg->childID?>)">辅助</button></td>
                        </tr>
                    <?php }?>
                </table>
                <p class="total">共 <?php echo count($parent_reg_list)?> 条</p>
            <?php } else{?>
                <h4>暂无需要您帮助注册的家长</h4>
            <?php }?>
        </div>
    </div>
    <?php include 'footer.php'?>
</div>

<script src="js/jquery-1.12.4.js"></script>
<script>

    function helpParent(parentID) {

        $.get('user/help_parent',{
            parentID:parentID,
        },function (data) {
            if(data == 'success'){
                alert('辅助成功！');
                location.reload();
            }
        },'text')

    }

    function helpStudent(studentID) {
        $.get('user/help_student',{
            studentID:studentID,
        },function (data) {
            if(data == 'success'){
                alert('辅助成功！');
                location.reload();
            }
        },'text')
    }
</script>
</body>
</html>