<h1>
    欢迎:
    <?php
    //直接输出调用页面时从数据库传过来的对象参数
//    echo $user->name;

//  通过session获取输出
    $user = $this->session->userdata('user');
    echo $user->name;

    ?>
</h1>