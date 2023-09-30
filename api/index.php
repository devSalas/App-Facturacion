<?php
require_once '../db/Database.php';

// Crear una instancia de la clase Database para la conexión a la base de datos.
$database = new Database();
$conexion = $database->conectar();

// Habilita la recepción de solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe la palabra enviada en formato JSON.
    $data = json_decode(file_get_contents('php://input'));

    // Verifica si se recibió una palabra válida.
    if ($data && isset($data->nombre)) {
        // Escapa la palabra para evitar problemas de seguridad.
        $nombre = $conexion->quote('%' . $data->nombre . '%');

        // Realiza una consulta para buscar palabras que contengan la palabra especificada.
        $query = "SELECT * FROM productos WHERE nombre LIKE $nombre";
        $result = $database->obtener($query);
        echo json_encode($result);
        if ($result) {
            $palabras = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $palabras[] = $row['nombre'];
            }
            $response = [
                'status' => 'success',
                'message' => 'Palabras encontradas:',
                'data' => $palabras,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error al obtener palabras.',
            ];
        }
    } else {
        // Si no se recibió una palabra válida, devuelve un mensaje de error.
        $response = [
            'status' => 'error',
            'message' => 'No se recibió una palabra válida.',
        ];
    }
    // Configura las cabeceras para que la respuesta sea en formato JSON.
    header('Content-Type: application/json');

    // Devuelve la respuesta en formato JSON.
    echo json_encode($response);
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

// Cierra la conexión a la base de datos.
$database->close();
?>
