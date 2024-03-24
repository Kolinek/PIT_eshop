<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (name, email, password_hash) VALUES (:username, :email, :password);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query failde: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}




