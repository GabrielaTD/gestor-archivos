<?php

class GestorArchivos
{
    // Conexión
    private $conexion;

    // Carpeta uploads
    private $directorio;

    // Tamaño máximo
    private $tamanoMaximo;

    // Tipos permitidos
    private $tiposPermitidos;

    // Extensiones permitidas
    private $extensionesPermitidas;

    // Constructor
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
        $this->directorio = "uploads/";
        $this->tamanoMaximo = 5 * 1024 * 1024;

        $this->tiposPermitidos = [
            "application/pdf",
            "image/jpeg",
            "image/png"
        ];

        $this->extensionesPermitidas = [
            "pdf","jpg","jpeg","png"
        ];
    }

    // Subir archivo
    public function subir($archivo,$titulo)
    {
        if($archivo["error"] != 0){
            return;
        }

        if($archivo["size"] > $this->tamanoMaximo){
            return;
        }

        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));

        if(!in_array($extension,$this->extensionesPermitidas)){
            return;
        }

        // Validar tipo MIME
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo,$archivo["tmp_name"]);
        finfo_close($finfo);

        if(!in_array($mime,$this->tiposPermitidos)){
            return;
        }

        // Nombre seguro
        $nombreSeguro = uniqid("archivo_").".".$extension;

        // Mover archivo
        move_uploaded_file($archivo["tmp_name"],$this->directorio.$nombreSeguro);

        // Guardar en BD
        $sql = "INSERT INTO archivos
        (titulo,nombre_original,nombre_guardado,tipo,tamano)
        VALUES (?,?,?,?,?)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param(
            "ssssi",
            $titulo,
            $archivo["name"],
            $nombreSeguro,
            $mime,
            $archivo["size"]
        );

        $stmt->execute();
        $stmt->close();
    }

    // Listar archivos
    public function listar()
    {
        return $this->conexion->query(
            "SELECT * FROM archivos ORDER BY fecha_subida DESC"
        );
    }

    // Eliminar archivo
    public function eliminar($id)
    {
        $sql = "SELECT nombre_guardado FROM archivos WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $res = $stmt->get_result();

        if($res->num_rows == 0){
            return;
        }

        $archivo = $res->fetch_assoc();

        $ruta = $this->directorio.$archivo["nombre_guardado"];

        if(file_exists($ruta)){
            unlink($ruta);
        }

        $stmt->close();

        $stmt = $this->conexion->prepare(
            "DELETE FROM archivos WHERE id=?"
        );

        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }

    // Convertir tamaño
    public function convertirTamano($b)
    {
        if($b >= 1048576){
            return round($b/1048576,2)." MB";
        }

        return round($b/1024,2)." KB";
    }

    // Iconos
    public function icono($t)
    {
        if($t=="application/pdf") return "📄";
        if($t=="image/jpeg") return "🖼️";
        if($t=="image/png") return "🖼️";
        return "📁";
    }
}
?>