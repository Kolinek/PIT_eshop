<?php
if(isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    if(isset($_COOKIE['cart'])) {
        $cart_items = unserialize($_COOKIE['cart']);
    } else {
        $cart_items = array();
    }

    $cart_items[] = $productId;

    $serialized_cart = serialize($cart_items);
    setcookie("cart", $serialized_cart, time() + 3600, "/");

    header("Location: ../index.php");
    exit;
} else {
    echo "Invalid product ID.";
}
?>