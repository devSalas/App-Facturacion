<?php
echo "hola";
require_once "../db/Database.php";

if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $database = new Database();
    $conexion = $database->conectar();

    try {
        $consulta = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute([$nombre, $descripcion, $precio, $stock]);

        // Redirige a la página principal o muestra un mensaje de éxito
        header("Location: ../pages/registrar/producto.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al agregar el producto: " . $e->getMessage();
    }
}
?>
