<?php
session_start();
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = array();
}

$errors = array();
$title = $author = $price = $quantity = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar entradas
    $title = trim(htmlspecialchars($_POST['title']));
    $author = trim(htmlspecialchars($_POST['author']));
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);
    
    // Validaciones
    if (empty($title)) {
        $errors[] = "El título del libro es obligatorio.";
    }
    if (empty($author)) {
        $errors[] = "El nombre del autor es obligatorio.";
    }
    if (!is_numeric($price) || $price <= 0) {
        $errors[] = "El precio debe ser un valor numérico positivo.";
    }
    if (!is_numeric($quantity) || $quantity <= 0) {
        $errors[] = "La cantidad debe ser un valor numérico positivo.";
    }
    
    if (empty($errors)) {
        // Crear un identificador único para el libro (por ejemplo, usando time())
        $id = time();
        $book = array(
            'id'       => $id,
            'title'    => $title,
            'author'   => $author,
            'price'    => $price,
            'quantity' => $quantity
        );
        
        // Guardar el libro en la sesión
        $_SESSION['books'][$id] = $book;
        
        // Redireccionar al listado de libros
        header("Location: list.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Registrar Libro</h1>
    <?php
    if (!empty($errors)) {
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>
    <form method="post" action="register.php">
        <label for="title">Título del libro:</label><br>
        <input type="text" name="title" id="title" value="<?php echo $title; ?>"><br><br>
        
        <label for="author">Nombre del autor:</label><br>
        <input type="text" name="author" id="author" value="<?php echo $author; ?>"><br><br>
        
        <label for="price">Precio del libro:</label><br>
        <input type="text" name="price" id="price" value="<?php echo $price; ?>"><br><br>
        
        <label for="quantity">Cantidad de ejemplares:</label><br>
        <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>"><br><br>
        
        <input type="submit" value="Registrar Libro">
    </form>
</body>
</html>
