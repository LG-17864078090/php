<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/14
 * Time: 13:53
 */
$name = $_GET['name'];
$p1 = $_GET['p1'];
$p2 = $_GET['p2'];

if($name == ''){
    echo 'nameError';
}elseif($p1 == ''){
    echo 'psw1Error';
}elseif($p2 == ''){
    echo 'psw2Error';
}elseif($p1 != $p2){
    echo 'pswError';
}else{
    echo 'success';
}
