<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_id"]) && is_numeric($_POST["product_id"])) {
        $product_id = $_POST["product_id"];

        try {
            require_once "dbh.inc.php";

            $query = "DELETE FROM products WHERE id = :product_id";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":product_id", $product_id);
            $stmt->execute();


            $pdo = null;
            $stmt = null;

            header("Location: ../index.php");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        echo "Invalid product ID.";
    }
} else {
    header("Location: ../index.php");
    die();
}