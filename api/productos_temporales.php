<?php
require_once '../db/Database.php';

// Crear una instancia de la clase Database para la conexión a la base de datos.
$database = new Database();
$conexion = $database->conectar();

// Habilita la recepción de solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe la palabra enviada en formato JSON.
    $data = json_decode(file_get_contents('php://input'));

    


    $slq="Insert Into table  `productos_temporales`(item,nombre,descripcion,precio,cantidad,importe) values()  ";

    echo json_encode($data);
} else {
    // Si no es una solicitud POST, devuelve un mensaje de error.
    $response = [
        'status' => 'error',
        'message' => 'Solicitud no permitida.',
    ];

    // Configura las cabeceras para que la respuesta sea en formato JSON.
    header('Content-Type: application/json');

    // Devuelve la respuesta en formato JSON.
    echo json_encode($response);
}
?>