<?php
class ConexionBDD {
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $baseDatos = "dbfactura";
    private $conexion;
    
    function getConexion() {
        return $this->conexion;
    }

    function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->baseDatos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Añadir el método prepare para poder utilizar consultas preparadas
    public function prepare($query) {
        return $this->conexion->prepare($query);
    }

    function ejecutarConsulta($sql) {
        $resultado = $this->conexion->query($sql);

        if (!$resultado) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $resultado;
    }

    function Insertar($sql) {
        $resultado = $this->ejecutarConsulta($sql);

        if ($resultado) {
            return "Datos Insertados";
        } else {
            return "Error al Insertar: " . $this->conexion->error;
        }
    }

    function Actualizar($sql) {
        $resultado = $this->ejecutarConsulta($sql);

        if ($resultado) {
            return "Datos Actualizados";
        } else {
            return "Error al Actualizar: " . $this->conexion->error;
        }
    }

    function Eliminar($sql) {
        $resultado = $this->ejecutarConsulta($sql);

        if ($resultado) {
            return "Datos Eliminados";
        } else {
            return "Error al Eliminar: " . $this->conexion->error;
        }
    }

    function Consultar($sql) {
        return $this->ejecutarConsulta($sql);
    }

    function __destruct() {
        $this->conexion->close();
    }
}
?>
