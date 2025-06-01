<?php
include '../includes/db.php';
include '../includes/header2.php';

$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) == 0) {
    echo "<p>No hay productos disponibles.</p>";
    include '../includes/footer.php';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos - Chapin Donas</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .productos-lista {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .producto {
            background: #fff8f1;
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
            text-align: center;
            width: 250px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .producto:hover {
            transform: scale(1.05);
        }

        .producto img {
            max-width: 200px;
            max-height: 150px;
            border-radius: 10px;
        }

        .producto h3 {
            margin-top: 10px;
            font-size: 20px;
        }

        .producto p {
            font-size: 16px;
            margin: 10px 0;
        }

        .producto a {
            display: inline-block;
            background-color: #ffb347;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .producto a:hover {
            background-color: #ff9f00;
        }
    </style>
</head>
<body>

<div class="productos-lista">
    <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
        <div class="producto">
            <img src="../images/img_productos<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
            <h3><?php echo $producto['nombre']; ?></h3>
            <p><strong>Precio:</strong> Q<?php echo number_format($producto['precio'], 2); ?></p>
            <a href="ver_producto.php?id=<?php echo $producto['id']; ?>">Ver detalles</a>
            <!-- Enlace para eliminar el producto -->
            <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');" style="background-color: red; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; margin-top: 10px;">Eliminar</a>
        </div>
    <?php endwhile; ?>
</div>


</body>
</html>


