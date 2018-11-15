<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/14
 * Time: 16:36
 */

$con = mysqli_connect('localhost:3306','root','');//创建到达数据库的连接
//var_dump($con);
//mysqli_query("CREATE DATABASE my_db",$con);

mysqli_select_db($con,'test');
$result = mysqli_query($con,"SELECT * FROM test order by age desc");



while($row = mysqli_fetch_array($result,MYSQLI_NUM))
{
    echo $row[0] . " " . $row[1]. " " . $row[2];
    echo "<br />";
}


mysqli_close($con);//关闭连接


////
//
////$sql="select name FROM test ";
////$result = mysqli_fetch_array($con,$sql);
//var_dump($result);
//echo "<br>";

//mysqli_query($con,"DELETE FROM test WHERE name ='ssd'");
