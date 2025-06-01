<?php
session_start();
include '../includes/db.php';
include '../includes/header.php';
// Si no hay carrito, lo inicializamos
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Añadir producto al carrito
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    // Comprobar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$id_producto] = array(
            'cantidad' => $cantidad
        );
    }
}

$productos_carrito = $_SESSION['carrito'];
?>

    <div class="contenedor">
        <h2>Carrito de Compras</h2>

        <?php if (count($productos_carrito) == 0): ?>
            <p>Tu carrito está vacío. ¡Agrega productos!</p>
        <?php else: ?>
            <table>
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                foreach ($productos_carrito as $id_producto => $info) {
                    $query = "SELECT * FROM productos WHERE id = $id_producto";
                    $resultado = mysqli_query($conexion, $query);
                    $producto = mysqli_fetch_assoc($resultado);
                    $subtotal = $producto['precio'] * $info['cantidad'];
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $info['cantidad']; ?></td>
                        <td>Q<?php echo $producto['precio']; ?></td>
                        <td>Q<?php echo number_format($subtotal, 2); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td><strong>Q<?php echo number_format($total, 2); ?></strong></td>
                </tr>
                </tbody>
            </table>
            <form action="comprar.php" method="POST">
                <button type="submit">Finalizar compra</button>
            </form>
        <?php endif; ?>
    </div>

<style>


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