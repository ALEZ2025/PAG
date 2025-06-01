<?php
session_start();
include '../includes/db.php';
include '../css/style.css';
// Verificar si el usuario está logueado
if (!isset($_SESSION['cliente'])) {
    header('Location: login.php');
    exit();
}

// Si el carrito está vacío
if (empty($_SESSION['carrito'])) {
    header('Location: carrito.php');
    exit();
}

// Obtener los productos del carrito
$total = 0;
$detalles_pedido = [];
foreach ($_SESSION['carrito'] as $id_producto => $info) {
    $query = "SELECT * FROM productos WHERE id = $id_producto";
    $resultado = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($resultado);
    $subtotal = $producto['precio'] * $info['cantidad'];
    $detalles_pedido[] = [
        'id_producto' => $producto['id'],
        'cantidad' => $info['cantidad'],
        'subtotal' => $subtotal
    ];
    $total += $subtotal;
}

// Insertar el pedido en la base de datos
$id_cliente = $_SESSION['cliente'];
$query_pedido = "INSERT INTO pedidos (id_cliente, total) VALUES ($id_cliente, $total)";
mysqli_query($conexion, $query_pedido);
$id_pedido = mysqli_insert_id($conexion);

// Insertar detalles del pedido
foreach ($detalles_pedido as $detalle) {
    $query_detalle = "INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, subtotal) 
                      VALUES ($id_pedido, {$detalle['id_producto']}, {$detalle['cantidad']}, {$detalle['subtotal']})";
    mysqli_query($conexion, $query_detalle);
}

// Vaciar el carrito
unset($_SESSION['carrito']);

// Redirigir a la página de confirmación
header('Location: confirmacion.php');
exit();

