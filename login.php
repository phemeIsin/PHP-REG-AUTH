<?php
//this will handle the logins, if the user exists in the database though
require 'config.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM login_system WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
    <h1>LOGIN</h1>
    <?php if ($error): ?>
      <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
      <input type="email" name="email" placeholder="EMAIL" required>
      <input type="password" name="password" placeholder="PASSWORD" required>
      <button type="submit">SUBMIT</button>
    </form>
    <div class="register-forget"><a href="register.php">REGISTER</a></div>
  </div>
  <div class="theme-btn-container"></div>
</section>
<script src="script.php"></script>
</body>
</html>
