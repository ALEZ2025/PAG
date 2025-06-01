<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $query = "SELECT * FROM clientes WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $query);

    if ($cliente = mysqli_fetch_assoc($resultado)) {
        if ($password == $cliente['password']) {
            $_SESSION['cliente'] = $cliente['id'];
            $_SESSION['nombre_cliente'] = $cliente['nombre'];
            header('Location: ../index.html');
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Correo no encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            padding-top: 50px;
            padding-bottom: 60px;

        }

        h2 {
            text-align: center;
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }

        .login-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            height: 340px;
            text-align: center;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #ffb347;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #ff9f00;
        }

        .login-form p {
            font-size: 14px;
        }

        .login-form a {
            color: #ff9f00;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

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

<div class="main-wrapper">
    <div class="login-form">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="correo" placeholder="Correo electrónico" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
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
