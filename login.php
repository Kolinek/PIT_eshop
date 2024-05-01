<?php
require_once 'include/signup_view.inc.php';
require_once 'include/config_session.inc.php';
require_once 'include/login_view.inc.php';
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
             <li><a href="cart.php">
                <?php
                if(isset($_COOKIE['cart'])) 
                {
                $cart_items = unserialize($_COOKIE['cart']);
                echo "(" . count($cart_items) . ") ";
                }
                ?>
             Košík</a></li>

            <li><a href="login.php">Prihlásenie</a></li>
            <?php
            if(isset($_SESSION["user_id"]))
            {
                echo '<li><a href="product.php">Administrácia</a></li>';
            }
            ?>
            
        </ul>
    </div>
 </nav>


<div class="odsadeniezhora">

<?php
output_username();
?>

<h1>Prihlasenie</h1>

<form action="include/login.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="password" placeholder="Password">
    <button>signin</button>
</form>

<?php
    check_login_errors();
?>
<h1>Registrácia</h1>

<form action="include/signup.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="password" placeholder="Password">
    <button>signup</button>
</form>



<?php
check_signup_errors();
?>

<h1>Odhlásenie</h1>

<form action="include/logout.inc.php" method="post">
    <button>logout</button>
</form>

</div>



</body>
</html>
