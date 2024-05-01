<?php
require_once 'include/dbh.inc.php';

echo '<li><a href="index.php">domov </a></li>';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $_GET['id'];

    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $productId);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        $priceWithVAT = $product['price'] * 1.20;
?>

<div class="product-detail">
    <h2>Product Detail</h2>
    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
    <p><?php echo htmlspecialchars($product['description']); ?></p>
    <p>Cena s DPH: $<?php echo number_format($product['price'], 2); ?></p>
    <p>Cena bez DPH: $<?php echo number_format($priceWithVAT, 2); ?></p>
    <form action="include/add_to_cart.inc.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <button type="submit">Add to Cart</button>
    </form>
</div>

<?php
    } else {
        echo "<p>Product with ID $productId does not exist.</p>";
    }
} else {
    echo "<p>Invalid input parameter.</p>";
}
?>