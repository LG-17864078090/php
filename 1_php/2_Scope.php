<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: LG-->
<!-- * Date: 2018/10/13-->
<!-- * Time: 13:50-->
<!-- */-->

<!DOCTYPE html>
<html>
<body>
    <?php
    $color = 'red'; //定义变量，无需关键字
    echo "这是一个PHP鸭" . $color; //字符串拼接，不用加号而用"."
    //双引号中不用字符串拼接，双引号中可以直接使用变量，单引不可以
    ?>

    <?php
    $x=5; // 全局作用域

    function myTest() {
        global $x;  //局部想引用全局变量需加global
        $y=10;    // 局部作用域
        echo "<p>测试函数内部的变量：</p>";
        echo "变量 x 是：$x";
        echo "<br>";
        echo "变量 y 是：$y";
    }
    myTest();

    echo "<p>测试函数之外的变量：</p>";
    echo "变量 x 是：$x";
    echo "<br>";
    echo "变量 y 是：$y";//局部变量无法在作用域外访问


    function myStaticTest() {
        static $xx=0;  //静态变量
        echo $xx;
        $xx++;
    }
    myStaticTest();
    myStaticTest();
    myStaticTest();
    ?>




</body>
</html>