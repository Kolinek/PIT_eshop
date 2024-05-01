<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    setcookie("cart", "", time() - 3600, "/"); //vymazanie cookie
    
    header("Location: ../cart.php");
    exit;
} else {
    header("Location: ../cart.php");
    exit;
}
