<?php
global $conexion;
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM productos WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($resultado);
} else {
    header('Location: ver_productos.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['name'];

    if ($imagen) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/img_productos$imagen");
    } else {
        $imagen = $producto['imagen'];  // Mantener la imagen existente
    }

    $query = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, imagen = '$imagen' WHERE id = $id";
    if (mysqli_query($conexion, $query)) {
        header('Location: ver_productos.php');
        exit();
    } else {
        $error = "Error al editar el producto: " . mysqli_error($conexion);
    }
}
?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Producto - Chapin Donas</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <h2>Editar Producto</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>
        <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea><br>
        <input type="number" name="precio" value="<?php echo $producto['precio']; ?>" required><br>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen"><br>
        <button type="submit">Guardar cambios</button>
    </form>
    </body>
    </html>

