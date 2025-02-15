<?php
session_start();
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = array();
}

if (!isset($_GET['id'])) {
    header("Location: list.php");
    exit();
}

$id = $_GET['id'];
if (!isset($_SESSION['books'][$id])) {
    header("Location: list.php");
    exit();
}

$book = $_SESSION['books'][$id];
$errors = array();
$title = $book['title'];
$author = $book['author'];
$price = $book['price'];
$quantity = $book['quantity'];

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
        // Actualizar el libro en la sesión
        $_SESSION['books'][$id] = array(
            'id'       => $id,
            'title'    => $title,
            'author'   => $author,
            'price'    => $price,
            'quantity' => $quantity
        );
        // Asignar mensaje de éxito para mostrar en list.php
        $_SESSION['edit_success'] = "El libro ha sido editado con éxito.";
        header("Location: list.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Libro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Actualizar Libro</h1>
        <?php
        if (!empty($errors)) {
            echo "<ul class='error'>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }
        ?>
        <form method="post" action="update.php?id=<?php echo $id; ?>">
            <label for="title">Título del libro:</label>
            <input type="text" name="title" id="title" value="<?php echo $title; ?>">
            
            <label for="author">Nombre del autor:</label>
            <input type="text" name="author" id="author" value="<?php echo $author; ?>">
            
            <label for="price">Precio del libro:</label>
            <input type="text" name="price" id="price" value="<?php echo $price; ?>">
            
            <label for="quantity">Cantidad de ejemplares:</label>
            <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
            
            <input type="submit" value="Actualizar Libro">
        </form>
    </div>
</body>
</html>
