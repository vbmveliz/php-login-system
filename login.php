<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        header("Location: index.php?error=Campos vacíos");
        exit();
    }

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en prepare: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user['username'];

            header("Location: dashboard.php");
            exit();

        } else {
            header("Location: index.php?error=Contraseña incorrecta");
            exit();
        }

    } else {
        header("Location: index.php?error=Usuario no encontrado");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>