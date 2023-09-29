<?php
require_once "../db/Database.php";

if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email= $_POST['email'];

    $database = new Database();
    $conexion = $database->conectar();

    try {
        $consulta = "INSERT INTO clientes(nombre, direccion, telefono, email) VALUES (?, ?, ?, ?)";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute([$nombre, $direccion, $telefono, $email]);

        // Redirige a la página principal o muestra un mensaje de éxito
        header("Location: ../pages/registrar/cliente.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al agregar el cliente: " . $e->getMessage();
    }
}
?>
