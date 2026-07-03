<?php

// Iniciar sesión
session_start();

// Verificar si existe usuario logueado
if(!isset($_SESSION["usuario"])){

    // Si no hay sesión, redirigir
    header("Location: login.php");
    exit;
}

?>