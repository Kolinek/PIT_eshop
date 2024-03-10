<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            background-color: lightgray;
        }
        p{
            display: inline-block;
            color: white;
            font-weight: bold;
            background-color: blue;
            padding: 3px;
        }
    </style>
</head>
<body>
    
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="prveCislo"></label><br>
  <input type="text" id="prveCislo" name="prveCislo"><br>

  <label for="operator">operator</label><br>
  <input type="text" id="operator" name="operator"><br>

  <label for="druheCislo"></label><br>
  <input type="text" id="druheCislo" name="druheCislo">
  <input type="submit">
</form>
<hr>


<?php
$prveCislo = $_POST['prveCislo'];
$druheCislo = $_POST['druheCislo'];
$operator = $_POST['operator'];
$vysledok;

switch ($operator) {
    case '+': $vysledok = $prveCislo + $druheCislo; echo "<p class='test'>";echo $vysledok; echo "</p>" ;break;
    case '-': $vysledok = $prveCislo - $druheCislo; echo "<p class='test'>";echo $vysledok; echo "</p>" ;break;
    case '*'; $vysledok = $prveCislo * $druheCislo; echo "<p class='test'>";echo $vysledok; echo "</p>" ;break;
    case '/': $vysledok = $prveCislo / $druheCislo; echo "<p class='test'>";echo $vysledok; echo "</p>" ;break;
    default: echo "pojebalo sa to";
}



?>


</body>
</html>
