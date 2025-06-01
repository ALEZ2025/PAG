<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapin Donas - Donas Artesanales</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff9933;
            --secondary-color: #ff6699;
            --dark-color: #333333;
            --light-color: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff8f0;
        }

        .navbar {
            background-color: var(--light-color);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand img {
            height: 50px;
        }


        .hero-section {
            background-color: var(--primary-color);
            color: var(--light-color);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: "";
            background-image: url('/api/placeholder/1200/300');
            background-size: cover;
            opacity: 0.15;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .product-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-bottom: 25px;
            background-color: var(--light-color);
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #e88a20;
            border-color: #e88a20;
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: var(--light-color);
        }

        .category-badge {
            background-color: var(--secondary-color);
            color: var(--light-color);
            font-size: 0.8rem;
        }

        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            width: 60%;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 0;
        }

        footer {
            background-color: var(--dark-color);
            color: var(--light-color);
            padding: 40px 0;
        }

        .cart-icon {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: var(--secondary-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }



    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../images/logo3.png" alt="Chapin Donas Logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="../index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../productos/index.php">Donas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Paquetes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cliente/contacto.php">Contacto</a>
                </li>
            </ul>
            <div class="ms-3 d-flex align-items-center">
                <a href="../cliente/login.php" class="btn btn-outline-primary me-2">
                    <i class="fas fa-user"></i>
                </a>
                <a href="../cliente/carrito.php" class="btn btn-outline-primary cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>

</body>
</html>
