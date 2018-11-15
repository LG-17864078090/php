<?php
/**
 * Created by PhpStorm.
 * User: LG
 * Date: 2018/10/13
 * Time: 14:17
 */

class Car
{
    var $color;
    function Car($color='green'){
        $this->color=$color;//调用类的属性与方法使用‘ -> ’而不是‘ . ’
    }
    function what_color(){
        return $this->color;
    }
}
$car1 = new Car();
$car2 = new Car('red');
echo $car1->what_color();
echo $car2->what_color();

