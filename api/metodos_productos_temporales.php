<?php
require_once '../db/Database.php';

// Crear una instancia de la clase Database para la conexión a la base de datos.
$database = new Database();
$conexion = $database->conectar();

// Habilita la recepción de solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'));

    print_r($data);
}



?>