<?php

// Iniciar sesión
session_start();

// Conexión a base de datos
require_once "config/conexion.php";

// Verificar datos enviados
if(isset($_POST["usuario"]) && isset($_POST["password"])){

    // Recibir datos
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    // Consulta segura
    $sql = "SELECT * FROM usuarios WHERE usuario=? AND password=?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();

    $resultado = $stmt->get_result();

    // Validar usuario
    if($resultado->num_rows == 1){

        // Crear sesión
        $_SESSION["usuario"] = $usuario;

        // Redirigir al sistema
        header("Location: index.php");
        exit;

    } else {

        // Mensaje de error
        $error = "Usuario o contraseña incorrectos";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Biblioteca Digital - Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>

/* Fondo general */
body{
    background:#f4efff;
}

/* Contenedor centrado */
.login-container{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* Tarjeta login */
.login-card{
    width:380px;
    border:none;
    border-radius:15px;
    box-shadow:0px 5px 20px rgba(0,0,0,0.15);
}

/* Encabezado */
.login-header{
    background:#6f42c1;
    color:white;
    padding:15px;
    text-align:center;
    border-radius:15px 15px 0 0;
}

</style>

</head>

<body>

<div class="login-container">

    <div class="card login-card">

        <!-- HEADER -->
        <div class="login-header">

            <h4>
                <i class="bi bi-folder2-open"></i>
                Biblioteca Digital
            </h4>

        </div>

        <div class="p-4">

            <h5 class="text-center">Iniciar sesión</h5>

            <!-- ERROR -->
            <?php if(isset($error)){ ?>

                <div class="alert alert-danger">

                    <?php echo $error; ?>

                </div>

            <?php } ?>

            <!-- FORMULARIO -->
            <form method="POST" autocomplete="off">

                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control mb-2" required autocomplete="off">

                <label>Contraseña</label>
                <input type="password" name="password" class="form-control mb-3" required autocomplete="new-password">

                <button class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Entrar
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>