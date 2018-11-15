<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/13
 * Time: 16:36
 */

$colors = array("red","green","blue","yellow");

//foreach 循环只适用于数组，并用于遍历数组中的每个键/值对。
foreach ($colors as $value) {
    echo "$value <br>";
}

foreach ($colors as $key=>$value) {
    echo "键：$key ";
    echo "值：$value <br>";
}