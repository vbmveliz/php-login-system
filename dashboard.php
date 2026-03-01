<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

<h1>Bienvenido <?php echo htmlspecialchars($_SESSION['user']); ?> 🔥</h1>
<a href="logout.php">Cerrar sesión</a>

</body>
</html>