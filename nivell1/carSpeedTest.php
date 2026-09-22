<?php
use Velocimeter as Velocimeter;

$velocimeter = new Velocimeter(10);
echo $velocimeter->speedTest();
echo PHP_EOL;
$velocimeter2 = new Velocimeter(99);
echo $velocimeter2->speedTest();
echo PHP_EOL;
$velocimeter3 = new Velocimeter(130);
echo $velocimeter3->speedTest();
echo PHP_EOL;
$velocimeter4 = new Velocimeter(50);
echo $velocimeter4->speedTest();
echo PHP_EOL;
?>
