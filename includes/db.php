<?php
$servidor = 'localhost';
$usuario = 'root';
$contraseña = 'alez1014@123'; // Cambia esto si tienes una contraseña
$base_datos = 'chapin_donas';

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
