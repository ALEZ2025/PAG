<?php
include '../includes/db.php';
include '../includes/header2.php';

// Obtener productos de la base de datos
$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Chapin Donas</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: #fdfdfd;
        }

        .main-content {
            flex: 1;
            padding-bottom: 250px;
        }
        .contenedor {
            text-align: center;
            padding: 20px;
        }

        .productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
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

<div class="main-content">
    <div class="contenedor">
        <div class="productos">
            <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
                <div class="producto">
                    <img src="../images/img_productos<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                    <h3><?php echo $producto['nombre']; ?></h3>
                    <p>Q<?php echo number_format($producto['precio'], 2); ?></p>
                    <a href="ver_producto.php?id=<?php echo $producto['id']; ?>">Ver más</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
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
