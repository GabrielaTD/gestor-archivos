<?php
require_once "config/sesion.php";
require_once "config/conexion.php";
require_once "clases/GestorArchivos.php";

$gestor = new GestorArchivos($conexion);

if(isset($_GET["id"])){

    $gestor->eliminar($_GET["id"]);
}

header("Location:index.php");
exit;
?>