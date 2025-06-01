<?php
$servidor = 'localhost';
$usuario = 'tu usuario';
$contraseña = 'tu contraseña'; 
$base_datos = 'pag_web';

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
