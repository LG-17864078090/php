<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/14
 * Time: 9:34
 */

//$name=$_GET['username'];
//$psw = $_GET['pwd'];

$name = $_POST['username'];
$psw = $_POST['pwd'];
$sex = $_POST['sex'];
$hobby = $_POST['hobby'];
$school = $_POST['school'];


echo "用户名：$name <br> 密码：$psw <br>";
echo "性别：$sex <br>";
echo "学校：$school <br>";
var_dump($hobby);

