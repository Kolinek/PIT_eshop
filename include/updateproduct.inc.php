<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["product_id"]) && is_numeric($_POST["product_id"]) &&
        !empty($_POST["new_name"]) && !empty($_POST["new_description"]) && !empty($_POST["new_price"])) {

        $product_id = $_POST["product_id"];
        $new_name = $_POST["new_name"];
        $new_description = $_POST["new_description"];
        $new_price = $_POST["new_price"];

        try {
            require_once "dbh.inc.php";

            $query = "UPDATE products SET name = :new_name, description = :new_description, price = :new_price WHERE id = :product_id";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":new_name", $new_name);
            $stmt->bindParam(":new_description", $new_description);
            $stmt->bindParam(":new_price", $new_price);
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
        echo "Invalid input data.";
        sleep(1);
        header("Location: ../product.php");
        die();
    }
} else {
    header("Location: ../index.php");
    die();
}