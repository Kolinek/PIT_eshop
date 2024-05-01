<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["productname"]) && !empty($_POST["description"]) && !empty($_POST["price"])) {
        $productname = $_POST["productname"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        try {
            require_once "dbh.inc.php";

            $query = "INSERT INTO products (name, description, price) VALUES (:productname, :description, :price);";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":productname", $productname);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);

            $stmt->execute();

            $pdo = null;
            $stmt = null;

            header("Location: ../index.php");
            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        echo "Vypln vsetky polia!";
        sleep(1);
        header("Location: ../product.php");
        die();
    }
} else {
    header("Location: ../index.php");
    die();
}