<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM productos WHERE id = $id";
    if (mysqli_query($conexion, $query)) {
        header('Location: ver_productos.php');
        exit();
    } else {
        $error = "Error al eliminar el producto: " . mysqli_error($conexion);
    }
} else {
    header('Location: ver_productos.php');
    exit();
}
?>
