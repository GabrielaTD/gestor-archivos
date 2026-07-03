<?php

// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDatos = "biblioteca_digital";

// Crear conexión
$conexion = new mysqli(
    $servidor,
    $usuario,
    $contrasena,
    $baseDatos
);

// Verificar conexión
if($conexion->connect_error){
    die("Error de conexión");
}

// Codificación
$conexion->set_charset("utf8");

?>