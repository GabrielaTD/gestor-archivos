# Biblioteca Digital Personal

## Autor  
Evelyn Gabriela Tarapues Dávila  
Ingeniería en Tecnologías de la Información  

---

## Descripción del sistema  

La Biblioteca Digital Personal es una aplicación web desarrollada en PHP utilizando Programación Orientada a Objetos (POO) y base de datos MySQL.  

El sistema permite gestionar archivos digitales de forma segura, organizada y eficiente dentro de una interfaz web accesible desde el navegador.

---

## Funcionalidades  

- Subida de archivos con título personalizado  
- Visualización de archivos almacenados  
- Descarga de archivos desde el sistema  
- Eliminación segura de archivos  
- Validación de tipo y tamaño de archivo  

---

## Flujo del sistema  

1. El usuario ingresa un título para identificar el archivo  
2. Selecciona un archivo desde su dispositivo  
3. El sistema valida extensión, tipo MIME y tamaño  
4. El archivo se renombra automáticamente para evitar duplicados  
5. Se almacena en el servidor en la carpeta uploads  
6. Se registra la información en la base de datos  
7. El archivo queda disponible para descargar o eliminar  

---

## Estructura del proyecto  

- `index.php` → Interfaz principal del sistema  
- `subir.php` → Procesamiento de carga de archivos  
- `eliminar.php` → Eliminación de archivos  
- `clases/GestorArchivos.php` → Lógica principal (POO)  
- `config/conexion.php` → Conexión a la base de datos  
- `uploads/` → Almacenamiento de archivos subidos  
- `assets/` → Estilos e imágenes  
- `database/archivos.sql` → Estructura de la base de datos  

---

## Programación Orientada a Objetos (POO)  

El sistema implementa la clase `GestorArchivos`, la cual centraliza toda la lógica del manejo de archivos.

### Atributos principales:
- Conexión a la base de datos  
- Directorio de almacenamiento  
- Tamaño máximo permitido  
- Tipos de archivo permitidos  
- Extensiones permitidas  

### Métodos principales:
- `subir()` → Permite subir archivos al sistema  
- `listar()` → Obtiene los archivos almacenados  
- `eliminar()` → Elimina archivos del sistema  
- `convertirTamano()` → Convierte bytes a KB o MB  
- `icono()` → Retorna un ícono según el tipo de archivo  

---

## Seguridad implementada  

El sistema incorpora varias medidas de seguridad web:

- Validación de tipo MIME  
- Validación de extensiones permitidas  
- Límite de tamaño de archivos (5 MB)  
- Uso de consultas preparadas para prevenir SQL Injection  
- Renombrado automático de archivos para evitar duplicados  
- Protección de la carpeta uploads mediante archivo .htaccess  
- Evita ejecución de archivos en el servidor  

---

## Requisitos para ejecución  

1. Copiar el proyecto en la carpeta `htdocs` de XAMPP  
2. Iniciar Apache y MySQL  
3. Importar la base de datos desde `database/archivos.sql`  
4. Abrir en el navegador:  
   http://localhost/gestor-archivos  

---

## Tecnologías utilizadas  

- PHP  
- MySQL  
- HTML5  
- CSS3  
- Bootstrap 5  
- Apache  
- Programación Orientada a Objetos  

---

## Conclusión  

Este proyecto permite aplicar conceptos de Programación Orientada a Objetos, seguridad web y manejo de archivos en PHP, integrando buenas prácticas como validación de datos, estructuración modular y protección del servidor.