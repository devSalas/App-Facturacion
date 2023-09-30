<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "12345678";
    private $base_de_datos = "sistema_facturacion";
    public $conexion;

    public function conectar() {
        $this->conexion = null;

        try {
            $this->conexion = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->base_de_datos,
                $this->usuario,
                $this->contrasena
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }

        return $this->conexion;
    }

    public function obtener($consulta) {
        try {
            $stmt = $this->conexion->prepare($consulta);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener datos: " . $e->getMessage();
            return null;
        }
    }

    // Método para ejecutar consultas (INSERT, UPDATE, DELETE)
    public function ejecutar($consulta, $parametros = []) {
        try {
            $stmt = $this->conexion->prepare($consulta);
            $stmt->execute($parametros);
            return true; // Éxito
        } catch (PDOException $e) {
            echo "Error al ejecutar consulta: " . $e->getMessage();
            return false; // Fallo
        }
    }
}
?>
