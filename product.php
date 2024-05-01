<?php
require_once 'include/config_session.inc.php';
if(!isset($_SESSION["user_id"]))
{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Kolínek david.kolinek2@gmail.com">
    <link rel="icon" type="Favicon/png" href="">
    <link rel="stylesheet" href="styles/main.css">
    <title>Checkuj</title>
</head>
<body>

<nav>
  <a href="index.php"><img src="images/logo.png" alt="xxx"></a>
    <div class="nav-odkazy">
        <ul>
             <li><a href="login.php">Košík</a></li>
            <li><a href="login.php">Prihlásenie</a></li>
        </ul>
    </div>
 </nav>


<div class="odsadeniezhora">
<h1>Pridaj produkt</h1>

<form action="include/addproduct.php" method="post">
    <input type="text" name="productname" placeholder="product name">
    <input type="text" name="description" placeholder="description">
    <input type="text" name="price" placeholder="price">
    <button>Add product</button>
</form>

<h1>Odstráň produkt</h1>

<form action="include/removeproduct.inc.php" method="post">
    <label for="product_id">Zadaj id produktu, ktorý chceš odstrániť:</label><br>
    <input type="text" id="product_id" name="product_id"><br>
    <button type="submit">Odstrániť produkt</button>
</form>

<h1>Aktualizovať info o produkte</h1>


<form action="include/updateproduct.inc.php" method="post">
    <label for="product_id">ID produktu:</label><br>
    <input type="text" id="product_id" name="product_id"><br>
    <label for="new_name">Nové meno:</label><br>
    <input type="text" id="new_name" name="new_name"><br>
    <label for="new_description">Nový popis:</label><br>
    <input type="text" id="new_description" name="new_description"><br>
    <label for="new_price">Nová cena:</label><br>
    <input type="text" id="new_price" name="new_price"><br>
    <button type="submit">Aktualizovať produkt</button>
</form>
</div>
</body>
</html>
