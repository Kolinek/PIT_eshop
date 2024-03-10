<?php

$retazec = "Prvý PHP skript";
$int = 12;
$desatinne = 3.14;
$pravda = true;

echo $retazec;
echo "<br>";
echo $int;
echo "<br>";
echo $desatinne;
echo "<br>";
echo $pravda;
echo "<br>";

echo $int + (int)$desatinne;
echo "<br><br>";

define("CESTA","C:\Users\Default\Documents\index.php ");
echo CESTA;
echo "<br><br>";


echo "Obvod kruhu je: <br>";
echo 2*$desatinne*5;
echo "<br><br>";
echo "Obsah kruhu je: <br>";
echo $desatinne*5*5;
echo "<br><br>";

date_default_timezone_set('Europe/Bratislava');

echo "Dnes je " . date("h:i") . "<br> Toto je binarny: ";

$binar = 20;

echo decbin($binar);
echo "<br> Toto je binarny: ";

$binar = 29;
echo decbin($binar);

echo "<br><br>";

function decToHex($number) {
    $hexadecimal = "";
    while ($number != 0)
    {
        $remainder = $number % 16;

        if ($remainder < 10) {
            $hexadecimal = $remainder . $hexadecimal;
        } else {
            $hexadecimal = chr(55 + $remainder) . $hexadecimal; // Prevod na ASCII pismeno
        }
        $number = floor($number / 16);

        
    }
    return $hexadecimal;
}

$decimalNumber = 707;
$hexadecimalNumber = decToHex($decimalNumber);
echo "<br>Hexadecimal representation of $decimalNumber is $hexadecimalNumber <br><br> ";


function decToBin($binar) {
    $binarnyZapis = "";
    $pomoc = 1;
    while ((int)$binar > 0) {
        echo "$pomoc. Zostatok po deleni:  ";
        echo $binar % 2;
        
        
        $pomoc = $pomoc +1;
        echo "   delenie: ";
        $binarnyZapis = ($binar % 2) . $binarnyZapis;
        $binar = (int)($binar / 2);
        echo $binar;
        echo "<br>";

    }
    return $binarnyZapis;
}

$binar = 20;
$binarnyPrepis = decToBin($binar);

echo "Binary representation of $binar is $binarnyPrepis<br><br>";


$binar = 29;
$binarnyPrepis = decToBin($binar);

echo "Binary representation of $nabir is $binarnyPrepis<br><br>";

echo PHP_VERSION;
echo "<hr>";
echo date_default_timezone_get();

