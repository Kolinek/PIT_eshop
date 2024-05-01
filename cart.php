<?php
require_once 'include/dbh.inc.php';

echo '<li><a href="index.php">domov </a></li>';

if(isset($_COOKIE['cart'])) {
    $cart_items = unserialize($_COOKIE['cart']);
    echo "Items in cart: " . htmlspecialchars(count($cart_items)) . "<br>";
    echo "IDs in cart: ";
    foreach ($cart_items as $item) {
        echo htmlspecialchars($item) . ", ";
    }
} else {
    echo "No items in cart.";
}

// Funkcia na výpočet ceny s DPH
function calculatePriceWithVAT($price) {
    return $price * 1.20;
}

// Získanie produktov z cookies
$cart_items = array();
if(isset($_COOKIE['cart'])) {
    $cart_items = unserialize($_COOKIE['cart']);
}

$total_price = 0;
$total_price_with_vat = 0;

echo '<h2>Nákupný košík</h2>';

// Ak máme niečo v košíku
if (!empty($cart_items)) {
    echo '<ol>';
    
    // Pre každé ID produktu v košíku zobrazíme informácie o produkte
    foreach ($cart_items as $productId) {
        // Dotaz na získanie informácií o produkte
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Ak sme našli produkt
        if ($product) {
            $price_with_vat = calculatePriceWithVAT($product['price']);
            $total_price += $product['price'];
            $total_price_with_vat += $price_with_vat;
            
            // Výpis informácií o produkte
            echo '<li>';
            echo '<p><strong>' . htmlspecialchars($product['name']) . '</strong></p>';
            echo '<p><strong>Cena bez DPH:</strong> $' . number_format($product['price'], 2) . '</p>';
            echo '<p><strong>Cena s DPH:</strong> $' . number_format($price_with_vat, 2) . '</p>';
            echo '</li>';
        }
    }

    echo '</ol>';
} else {
    echo "<p>Košík je prázdny.</p>";
}

// Výpis celkovej ceny
echo '<h3>Celková cena</h3>';
echo '<p><strong>Celková cena bez DPH:</strong> $' . number_format($total_price, 2) . '</p>';
echo '<p><strong>Celková cena s DPH:</strong> $' . number_format($total_price_with_vat, 2) . '</p>';


?>
<form action="include/empty_cart.inc.php" method="post">
    <button type="submit">Vyprázdniť košík</button>
</form>
