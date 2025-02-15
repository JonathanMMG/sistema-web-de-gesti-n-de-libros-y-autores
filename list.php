<?php
session_start();
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = array();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Incluir SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Listado de Libros</h1>
    
    <?php
    // Mostrar alerta de éxito por edición si existe
    if (isset($_SESSION['edit_success'])) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Editado!',
                    text: '" . $_SESSION['edit_success'] . "',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>";
        unset($_SESSION['edit_success']);
    }
    ?>
    
    <?php if (empty($_SESSION['books'])): ?>
        <p>No hay libros registrados.</p>
    <?php else: ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($_SESSION['books'] as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['price']); ?></td>
                    <td><?php echo htmlspecialchars($book['quantity']); ?></td>
                    <td>
                        <!-- Enlace de edición con confirmación -->
                        <a href="update.php?id=<?php echo $book['id']; ?>" class="edit-book">Editar</a> |
                        <!-- Enlace de eliminación con confirmación -->
                        <a href="delete.php?id=<?php echo $book['id']; ?>" class="delete-book">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <!-- Script para manejar las alertas de edición y eliminación con SweetAlert2 -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Confirmación para eliminación
        const deleteLinks = document.querySelectorAll('.delete-book');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });
        });

        // Confirmación para edición (opcional)
        const editLinks = document.querySelectorAll('.edit-book');
        editLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                Swal.fire({
                    title: '¿Deseas editar este libro?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, editar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });
        });
    });
    </script>
</body>
</html>
