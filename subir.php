<?php

session_start();

require_once "config/conexion.php";
require_once "clases/GestorArchivos.php";

$gestor = new GestorArchivos($conexion);

$mensaje = "";

if(isset($_POST["titulo"]) && isset($_FILES["archivo"])){

    $mensaje = $gestor->subir($_FILES["archivo"], $_POST["titulo"]);

}

// GUARDA MENSAJE SIEMPRE
$_SESSION["mensaje"] = $mensaje;

// REDIRECCIÓN
header("Location: index.php");
exit;

?>