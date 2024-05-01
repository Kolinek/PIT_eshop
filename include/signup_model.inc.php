<?php

declare(strict_types=1);

function get_username(object $pdo, string $username) {
    $query = "SELECT name FROM users WHERE name = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $password,string $email)
{
    $query = "INSERT INTO users (name, password_hash, email) VALUES (:username, :password, :email);";
    $stmt = $pdo->prepare($query);

    $hashed_password = hash('sha512', $password);

    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$hashed_password);
    $stmt->bindParam(":username",$username);
    $stmt->execute();
}