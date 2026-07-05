# Biblioteca Digital Personal

# Autor

Evelyn Gabriela Tarapues Dávila  
Ingeniería en Tecnologías de la Información

# Descripción del sistema

Este proyecto es una aplicación web desarrollada en PHP que permite la gestión de archivos mediante Programación Orientada a Objetos.

El sistema permite subir archivos, asignarles un título, visualizarlos en una tabla, descargarlos y eliminarlos de forma segura.

Los archivos se almacenan en el servidor y se registran en una base de datos MySQL.

# Instrucciones de uso

Para ejecutar el proyecto se deben seguir los siguientes pasos:

- Iniciar Apache y MySQL en XAMPP
- Importar la base de datos ubicada en database/archivos.sql
- Colocar la carpeta del proyecto dentro de htdocs
- Acceder desde el navegador a http://localhost/gestor-archivos
- Iniciar sesión con usuario Gabriela y contraseña GabrielaUTPL

# Clase utilizada

El sistema utiliza la clase GestorArchivos, la cual centraliza toda la lógica del sistema.

Sus métodos principales son:

- subir($archivo, $titulo): permite subir archivos al servidor con validaciones de seguridad
- listar(): obtiene todos los archivos registrados en la base de datos
- eliminar($id): elimina el archivo físico y su registro en la base de datos
- convertirTamano($bytes): convierte el tamaño del archivo a KB o MB
- icono($tipo): devuelve un icono según el tipo de archivo

La clase aplica Programación Orientada a Objetos mediante encapsulamiento, uso de constructor y separación de responsabilidades.

# Medidas de seguridad aplicadas

El sistema implementa varias medidas de seguridad para proteger el manejo de archivos:

- Validación de tipo MIME para evitar archivos peligrosos
- Validación de extensiones permitidas (PDF, JPG, PNG)
- Límite de tamaño de archivos para evitar sobrecarga del servidor
- Renombrado automático de archivos para evitar duplicados
- Eliminación segura de archivos físicos y registros en base de datos
- Uso de consultas preparadas para prevenir SQL Injection
- Protección de la carpeta uploads para evitar ejecución de archivos
- Control de acceso mediante sesiones de usuario
# Credenciales para ingreso a Biblioteca Digital

 Usuario: Gabriela 
 Contraseña: GabrielaUTPL
 
# Tecnologías utilizadas

PHP, MySQL, HTML5, CSS3, Bootstrap 5, Apache

