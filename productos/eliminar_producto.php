<?php
include '../includes/db.php';

// Verificar si se ha pasado un ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Consulta para eliminar el producto
    $query = "DELETE FROM productos WHERE id = $id";

    if (mysqli_query($conexion, $query)) {
        // Redirigir al listado de productos después de eliminar
        header("Location: lista_prodcutos.php");
        exit();
    } else {
        echo "<p>Error al eliminar el producto.</p>";
    }
} else {
    echo "<p>Producto no encontrado.</p>";
}

include '../includes/footer.php';
?>
