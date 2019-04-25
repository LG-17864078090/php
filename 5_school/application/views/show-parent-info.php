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
                    <td>帐号:</td>
                    <td><?php echo $parent->childID?></td>
                </tr>
                <tr>
                    <td>姓名:</td>
                    <td><?php echo $parent->name?></td>
                </tr>
                <tr>
                    <td>孩子姓名:</td>
                    <td><?php echo $student->name?></td>
                </tr>
                <tr>
                    <td>性别:</td>
                    <td><?php echo $parent->sex?></td>
                </tr>
                <tr>
                    <td>班主任:</td>
                    <td><?php echo $teacher->name?></td>
                </tr>
                <tr>
                    <td>手机号:</td>
<!--                    <td>--><?php //echo $student->phone?><!--</td>-->
                    <td><input type="text" class="input phone" disabled="disabled"  value="<?php echo $parent->phone?>"></td>
                </tr>
                <tr>
                    <td>家庭住址:</td>
                    <td><input type="text" class="input address" disabled="disabled" value="<?php echo $parent->address?>"></td>
                </tr>

            </table>

            <div class="change-info">
                <button class="change">信息更改</button><br>
                <button class="saveInfo">保存</button>
            </div>
        </div>
    </div>

    <?php include 'footer.php'?>

</div>
<script src="js/jquery-1.12.4.js"></script>
<script>
    $('.change').on('click',function () {
        $('.input').attr('disabled',false);
        $('.saveInfo').show();
    });


    $('.saveInfo').on('click',function () {
        var newPhone = $('.phone').val();
        var newAddress = $('.address').val();
        var flag = true;
        var nowParentID = <?php echo $user->childID?>;

        // console.log(newPhone,newAddress);
        if(!(/^1(3|4|5|7|8)\d{9}$/.test(newPhone))){
            flag = false;
            alert('手机号格式有误');
        }else if(newAddress == ''){
            flag = false;
            alert('地址不能为空');
        }

        if(flag){
            $.get('user/update_parent_info',{
                parentID:nowParentID,
                phone:newPhone,
                address:newAddress
            },function (data) {
                if(data == 'success'){
                    location.reload();
                }

            },'text')
        }

    })
</script>


</body>
</html>