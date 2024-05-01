<?php
require_once 'include/dbh.inc.php';
require_once 'include/config_session.inc.php';
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
        if(isset($_COOKIE['cart'])) {
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

<div class="inventory">
    <?php
      $query = "SELECT * FROM products;";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
  
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
      $pdo=null;
      $stmt=null;

      foreach ($results as $product)
      {
        echo '<div class="product">';
        echo '<h3>' . htmlspecialchars($product['name']) . '</h3>';
        echo '<p>' . htmlspecialchars($product['description']) . '</p>';
        echo '<p>Cena bez DPH: $' . number_format($product['price'], 2) . '</p>';
        echo '<a href="product_detail.php?id=' . $product['id'] . '">Detail produktu</a>';
        echo '</div>';
      }

      ?>


</div>

</body>
</html>
