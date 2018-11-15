<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/13
 * Time: 14:17
 */


//echo 和 print 之间的差异：
//echo  能够输出一个以上的字符串
//print  只能输出一个字符串，并始终返回 1
//提示：echo 比 print 稍快，因为它不返回任何值。
echo print "123::";

echo "<h2>PHP is fun!</h2>";
echo "Hello world!<br>";
echo "I'm about to learn PHP!<br>";
echo "This", " string", " was", " made", " with multiple parameters."; //echo可同时输出多个字符串

$txt1="Learn PHP";
$txt2="W3School.com.cn";
$cars=array("Volvo","BMW","SAAB");

echo $txt1;
echo "<br>";
echo "Study PHP at $txt2";
echo "<br>";
echo "My car is a {$cars[0]}";
echo "<br>";

var_dump($cars); //返回并输出变量的数据类型和值

$cars=null; //清空变量

?>
