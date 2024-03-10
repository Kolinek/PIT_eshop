<?php
echo 'ahoj';
$meno = 'Jozko';
echo "Ahoj $meno";
echo __LINE__;
echo PHP_VERSION;
echo "ahoj" . "/n";

$complete = true;
$score = 75;
$price = 0.99;
$greet = 'Ahoj kolega Hrinkino';

echo $complete;
echo "<br>";
echo $score;
echo "<br>";
echo $price;
echo "<br>";
echo $greet;
echo "<br>";

var_dump($price);
echo "<br>";


$pole = [1, 5 ,7,10.8, 'a','v', true];

print_r($pole);
echo "<br>";

function scitanie($x,$y)
{
    return $x + $y;
}

echo scitanie(2,3);
echo "<br>";
