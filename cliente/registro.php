<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $query = "INSERT INTO clientes (nombre, correo, password) VALUES ('$nombre', '$correo', '$password')";
    if (mysqli_query($conexion, $query)) {
        header('Location: login.php');
        exit();
    } else {
        $error = "Error al registrarse: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Chapin Donas</title>
    <style>
        /* Estilo para asegurar que el footer esté siempre abajo */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: #fefefe;
        }

        .main-content {
            flex: 1; /* Esto empuja el contenido hacia arriba y asegura que el footer esté al final */
        }

        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px; /* Espacio debajo del encabezado */
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #ffb347;
            color: white;
            border: none;
            padding: 12px 20px;
            margin-top: 15px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff9f00;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        /* Estilo del footer */
        footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: -100px; /* oculto inicialmente */
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
<?php include '../includes/header.php'; ?>
<div class="main-content">
    <div class="container-center">
        <div class="form-container">
            <h2>Crear cuenta</h2>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre completo" required>
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>

<script>
    const footer = document.querySelector("footer");
    let timer;

    document.addEventListener('mousemove', (e) => {
        const distanciaDesdeAbajo = window.innerHeight - e.clientY;

        if (distanciaDesdeAbajo < 300) {
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
