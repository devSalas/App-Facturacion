<?php
require_once '../db/Database.php';

// Crear una instancia de la clase Database para la conexión a la base de datos.
$database = new Database();
$conexion = $database->conectar();

// Habilita la recepción de solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe la palabra enviada en formato JSON.
    $data = json_decode(file_get_contents('php://input'));

        $nombre= $data->nombre;
        $descripcion=$data->descripcion;
        $unidad_medida=$data->unidad_medida;
        $precio=$data->precio;
        $cantidad=$data->cantidad;
        $importe=$data->importe;
        /* print_r($nombre); */

    // Consulta SQL con las variables concatenadas
    $sql = "INSERT INTO productos_temporales (item, nombre, descripcion, precio, cantidad, importe, unidad_medida) VALUES ('1', '$nombre', '$descripcion', '$precio', '$cantidad', '$importe', '$unidad_medida')";

    
    $database->ejecutar($sql);

    $sql2 ="SELECT * FROM productos_temporales";

    $consultarProductosTemporales = $database->obtener($sql2);

    header('Content-Type: application/json');
    echo json_encode($consultarProductosTemporales);
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