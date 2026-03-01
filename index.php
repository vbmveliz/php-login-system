<?php
session_start();

// Si el usuario ya está logueado, redirigir al dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}

// Mostrar error si existe
$error = "";
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>

  <!-- CSS -->
  <link rel="stylesheet" href="css/master.css">
</head>

<body>

  <div class="login-box">
    
    <img src="img/logo.png" class="avatar" alt="Avatar Image">

    <h1>Login Here</h1>

    <!-- Mostrar error si existe -->
    <?php if (!empty($error)): ?>
      <p style="color: red; text-align:center;">
        <?php echo htmlspecialchars($error); ?>
      </p>
    <?php endif; ?>

    <form action="login.php" method="POST">

      <!-- USERNAME -->
      <label for="username">Username</label>
      <input 
        type="text" 
        id="username"
        name="username"
        placeholder="Enter Username"
        required
      >

      <!-- PASSWORD -->
      <label for="password">Password</label>
      <input 
        type="password" 
        id="password"
        name="password"
        placeholder="Enter Password"
        required
      >

      <input type="submit" value="Log In">

      <a href="#">Lost your Password?</a><br>
      <a href="#">Don't have an account?</a>

    </form>
  </div>

</body>
</html>