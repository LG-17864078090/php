<?php $user = $this->session->userdata('user')?>
<div class="header">
    <a href="welcome/index"><img class="home" src="images/home.png" title="首页"></a>


    <?php if(isset($user)){?>
        <span>欢迎<?php echo $user->name;?></span>
        <span class="exit"><a href='user/logout'>[ 退出 ]</a></span>

    <?php }else{?>
        <span>您当前为游客身份，前去  <a href="welcome/login">登录</a></span>
    <?php }?>
    <img src="images/back.png" title="返回" class="back">
    

</div>
<style>
    .header .home{
        width: 25px;
        float: left;
        margin-top: 4px;
        margin-left: 10px;
    }
    .header{
        height: 30px;
        background: #ff6666;
    }
    .header .back{
        width: 20px;
        float: right;
        margin-top: 4px;
        margin-right
        : 10px;
        cursor: pointer;
    }

    .header>span{
        margin: 0 20px;
        text-align: center;
        line-height: 30px;
    }
    .header .exit{
        float: right;
        font-size: 14px;
        color: #666666;
    }
    .header .exit:hover{
        cursor: pointer;
    }
</style>

<script src="js/jquery-1.12.4.js"></script>
<script>
    $('.back').on('click',function () {
        window.history.back(1);
    })
</script>