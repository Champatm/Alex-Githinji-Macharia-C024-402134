<?php
$host = "localhost";
$dbname = "secure_login";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Create Database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS secure_login";
    $pdo->exec($sql);

    

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

