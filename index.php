<?php
session_start();
// Inicializar el arreglo de libros si aún no existe
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = array();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Gestión de Libros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Bienvenido al Sistema de Gestión de Libros</h1>
    <p>Utiliza el menú para navegar entre las distintas secciones.</p>
    <p>Jonathan Moreta - NRC : 1382-APLICACIÓN TECNOLOGÍAS WEB </p>
</body>
</html>
