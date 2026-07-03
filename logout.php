<?php

// Iniciar sesión
session_start();

// Destruir sesión
session_destroy();

// Redirigir a login
header("Location: login.php");
exit;

?>