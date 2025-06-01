<?php
global $conexion;
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['name'];

    if ($imagen) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/img_productos$imagen");
    }

    $query = "INSERT INTO productos (nombre, descripcion, precio, imagen) 
              VALUES ('$nombre', '$descripcion', $precio, '$imagen')";

    if (mysqli_query($conexion, $query)) {
        header('Location: ../productos/lista_prodcutos.php');
        exit();
    } else {
        $error = "Error al agregar el producto: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto - Chapin Donas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Agregar Producto</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre del producto" required><br>
    <textarea name="descripcion" placeholder="Descripción" required></textarea><br>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required><br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" required><br>
    <button type="submit">Agregar Producto</button>
</form>
</body>
</html>
