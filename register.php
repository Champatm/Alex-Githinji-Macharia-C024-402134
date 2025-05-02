<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  
  // First check if email already exists
  $checkStmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
  $checkStmt->execute(['email' => $email]);
  $existingUser = $checkStmt->fetch();

  if ($existingUser) {
    // Email already exists, show error message
    echo '<script>alert("Email already taken"); window.location.href = "register.html";</script>';
    exit;
  }

  // Email doesn't exist, proceed with registration
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
  $stmt->execute(['email' => $email, 'password' => $password]);

  header('Location: login.html');
}
?>