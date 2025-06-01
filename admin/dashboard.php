<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>

</head>
<body>
<h2>Bienvenido, <?php echo $_SESSION['admin']; ?> 👋</h2>
<nav>
    <a href="agregar_producto.php">Agregar Producto</a> |
    <a href="../productos/lista_prodcutos.php">Ver Productos</a> |
    <a href="logout.php">Cerrar Sesión</a>
</nav>
</body>
</html>
