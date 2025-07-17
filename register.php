<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO login_system (username, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $phone, $password]);

        echo "<script>alert('Registration successful. Please login.'); window.location.href='login.php';</script>";
        exit;
    } catch (PDOException $e) {
        $errors[] = "Database error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.php">
</head>
<body>
<section class="login-container">
  <div class="form-container">
    <div class="avatar">
      <div class="eye left"></div>
      <div class="eye right"></div>
      <div class="hand left"></div>
      <div class="hand right"></div>
    </div>
    <h1>REGISTER</h1>
    <?php foreach ($errors as $err): ?>
      <p style="color: red;"><?= htmlspecialchars($err) ?></p>
    <?php endforeach; ?>
    <form method="post">
      <input type="text" name="username" placeholder="USERNAME" required>
      <input type="email" name="email" placeholder="EMAIL" required>
      <input type="text" name="phone" placeholder="PHONE" required>
      <input type="password" name="password" placeholder="PASSWORD" required>
      <button type="submit">SIGN UP</button>
    </form>
    <div class="register-forget"><a href="login.php">LOGIN</a></div>
  </div>
  <div class="theme-btn-container"></div>
</section>
<script src="script.php"></script>
</body>
</html>
