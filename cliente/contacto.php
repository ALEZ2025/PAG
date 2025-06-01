<?php
include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <style>
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
            flex: 1;
            display: flex;
            justify-content: center;

            padding: 20px 0;
        }

        .centro {
            width: 100%;
            max-width: 800px;
            height: 400px;
            background-color: #fff8f1;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
        }

        .centro h2 {
            margin-top: 0;
        }

        .centro iframe {
            width: 100%;
            height: 100%;
            border: 0;
            border-radius: 10px;
            margin-top: 15px;
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
<div class="main-content">
    <div class="centro">
        <h2>📍 Nuestra Ubicación</h2>
        <p>¡Visítanos en nuestro local de Chapin Donas!</p>
        <iframe
                src="https://www.google.com/maps/embed?pb=!4v1743910623674!6m8!1m7!1sCAoSLEFGMVFpcE9EY195dk44YUY1ZlNHUXR0UHVxUjZwdDBJcVZ6QkM2c3A0a3Rh!2m2!1d14.55098653575739!2d-90.52306747371676!3f320.5678456241298!4f-28.024929797728625!5f0.7820865974627469"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
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
