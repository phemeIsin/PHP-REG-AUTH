<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO login_system (username, email, phone, password) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$username, $email, $phone, $password])) {
        echo "<script>alert('Registration successful. Please login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Registration failed. Try again.');</script>";
    }
}
?>
