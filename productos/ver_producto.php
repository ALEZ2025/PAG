<?php
include '../includes/db.php';
include '../includes/header.php';

// Verificamos si el ID del producto está presente en la URL
if (!isset($_GET['id'])) {
    echo "<p>Producto no encontrado.</p>";
    include '../includes/footer.php';
    exit();
}

// Obtenemos el ID del producto desde la URL
$id = intval($_GET['id']);

// Consulta para obtener el producto por ID
$query = "SELECT * FROM productos WHERE id = $id";
$resultado = mysqli_query($conexion, $query);

// Verificamos si el producto existe
if (mysqli_num_rows($resultado) == 0) {
    echo "<p>Producto no encontrado.</p>";
    include '../includes/footer.php';
    exit();
}

// Obtenemos los datos del producto
$producto = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $producto['nombre']; ?> - Chapin Donas</title>

    <style>
        .detalle-producto {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            Background: #fff8f1;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            padding-bottom: 300px;
        }

        .detalle-producto img {
            max-width: 200px;
            border-radius: 10px;
        }

        .detalle-producto h2 {
            margin-top: 20px;
            font-size: 28px;
        }

        .detalle-producto p {
            font-size: 18px;
            margin: 10px 0;
        }

        .btn-volver {
            display: inline-block;
            margin-top: 20px;
            background-color: #ffb347;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-volver:hover {
            background-color: #ff9f00;
        }

        footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: -100px;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            transition: bottom 0.4s ease;
            z-index: 1000;
        }

        footer.visible {
            bottom: 0;
        }


    </style>
</head>
<body>

<div class="detalle-producto">
    <!-- Mostramos la imagen del producto -->
    <img src="../images/img_productos<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">

    <!-- Mostramos el nombre del producto -->
    <h2><?php echo $producto['nombre']; ?></h2>

    <!-- Mostramos el precio del producto -->
    <p><strong>Precio:</strong> Q<?php echo number_format($producto['precio'], 2); ?></p>

    <!-- Mostramos la descripción completa del producto -->
    <p><strong>Descripción:</strong> <?php echo nl2br($producto['descripcion']); ?></p>

    <!-- Botón para volver a la página principal -->
    <a class="btn-volver" href="index.php">← Volver</a>
</div>

<?php include '../includes/footer.php'; ?>

<script>
    const footer = document.querySelector("footer");
    let timer;

    document.addEventListener('mousemove', (e) => {
        const distanciaDesdeAbajo = window.innerHeight - e.clientY;

        if (distanciaDesdeAbajo < 200) {
            footer.classList.add('visible');
            clearTimeout(timer);
        } else {
            timer = setTimeout(() => {
                footer.classList.remove('visible');
            }, 4000);
        }
    });
</script>

</body>
</html>
