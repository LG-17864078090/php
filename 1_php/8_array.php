<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/13
 * Time: 16:40
 */

function printArray($arr){
    foreach($arr as $val){
        echo $val;
        echo "  ";
    }
    echo "<br>";
}
//在 PHP 中，有三种数组类型：
//索引数组 - 带有数字索引的数组
//关联数组 - 带有指定键的数组
//多维数组 - 包含一个或多个数组的数组

//PHP 索引数组
//有两种创建索引数组的方法：
//索引是自动分配的（索引从 0 开始）或者也可以手动分配索引：
//自动分配创建
$cars=array("Volvo","BMW","SAAB");
//手动分配索引
$cars[0]="Volvo";
$cars[1]="BMW";
$cars[2]="SAAB";

echo count($cars);//返回数组的长度
echo "<br>";

//PHP 关联数组   关联数组是使用您分配给数组的指定键的数组
//有两种创建关联数组的方法
//1
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
//2
$age['Peter']="35";
$age['Ben']="37";
$age['Joe']="43";
//遍历关联数组
foreach($age as $x=>$x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}


//数组排序
$numbers=array(3,5,1,22,11);
sort($numbers);//升序
printArray($numbers);

rsort($numbers);//降序
printArray($numbers);

//sort() - 以升序对数组排序
//rsort() - 以降序对数组排序
//asort() - 根据值，以升序对关联数组进行排序
//ksort() - 根据键，以升序对关联数组进行排序
//arsort() - 根据值，以降序对关联数组进行排序
//krsort() - 根据键，以降序对关联数组进行排序
