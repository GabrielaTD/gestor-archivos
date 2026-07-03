<?php

// PROTECCIÓN DE SESIÓN (YA INCLUYE session_start())
require_once "config/sesion.php";

// CONEXIÓN A BD
require_once "config/conexion.php";

// CLASE PRINCIPAL
require_once "clases/GestorArchivos.php";

// OBJETO
$gestor = new GestorArchivos($conexion);

// LISTAR ARCHIVOS
$resultado = $gestor->listar();

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Biblioteca Digital Personal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>

<!-- HEADER -->
<header class="bg-dark text-white p-3">

<div class="container d-flex justify-content-between align-items-center">

<h4 class="mb-0">
<i class="bi bi-folder2-open"></i>
Biblioteca Digital
</h4>

<a href="logout.php" class="btn btn-light btn-sm">
Cerrar sesión
</a>

</div>

</header>

<main class="container mt-4">

<!-- MENSAJES -->
<?php
if(isset($_SESSION["mensaje"])){

    echo "<div class='alert alert-warning text-center'>"
        .$_SESSION["mensaje"].
        "</div>";

    unset($_SESSION["mensaje"]);
}
?>

<!-- PRESENTACIÓN -->
<section class="text-center mb-4">

    <img src="assets/img/foto.jpeg"
         class="foto-perfil mb-3"
         alt="Foto">

    <h2>Biblioteca Digital Personal</h2>

    <h5 class="text-primary">
        Evelyn Gabriela Tarapues Dávila
    </h5>

    <p class="text-muted">
        Ingeniería en Tecnologías de la Información
    </p>

    <p class="text-muted">
        Sistema web en PHP con Programación Orientada a Objetos
    </p>

</section>

<!-- FORMULARIO -->
<section class="card p-4">

<h5>Subir archivo</h5>

<form action="subir.php" method="POST" enctype="multipart/form-data">

<input type="text"
       name="titulo"
       class="form-control mb-2"
       placeholder="Título del archivo"
       required>

<input type="file"
       name="archivo"
       class="form-control mb-2"
       required>

<div class="alert alert-info">
Archivos permitidos: PDF, JPG, PNG <br>
Tamaño máximo: 10 MB
</div>

<button class="btn btn-primary w-100">
<i class="bi bi-cloud-upload"></i> Subir archivo
</button>

</form>

</section>

<!-- TABLA -->
<section class="card p-4 mt-4">

<h5>Archivos almacenados</h5>

<table class="table table-hover table-striped">

<thead>
<tr>
<th>Título</th>
<th>Archivo</th>
<th>Tamaño</th>
<th>Fecha</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>

<?php while($f = $resultado->fetch_assoc()){ ?>

<tr>

<!-- TÍTULO -->
<td>
<?php echo htmlspecialchars($f["titulo"]); ?>
</td>

<!-- ARCHIVO -->
<td>
<?php echo $gestor->icono($f["tipo"]); ?>
<?php echo $f["nombre_original"]; ?>
</td>

<!-- TAMAÑO -->
<td>
<?php echo $gestor->convertirTamano($f["tamano"]); ?>
</td>

<!-- FECHA -->
<td>
<?php echo $f["fecha_subida"]; ?>
</td>

<!-- ACCIONES -->
<td>

<a class="btn btn-success btn-sm"
href="uploads/<?php echo $f["nombre_guardado"]; ?>" download>
<i class="bi bi-download"></i>
</a>

<a class="btn btn-danger btn-sm"
href="eliminar.php?id=<?php echo $f["id"]; ?>"
onclick="return confirm('¿Desea eliminar este archivo?');">
<i class="bi bi-trash"></i>
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</section>

</main>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3 mt-5">

Biblioteca Digital Personal - Evelyn Gabriela Tarapues Dávila

</footer>

</body>
</html>