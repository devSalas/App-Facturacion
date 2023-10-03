<?php
require_once '../db/Database.php';

// Crear una instancia de la clase Database para la conexión a la base de datos.
$database = new Database();
$conexion = $database->conectar();

// Habilita la recepción de solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'));

    

    $numero_factura = $data->numero_factura;
    $fecha_emision = $data->fecha_emision;
    $cliente_id = $data->cliente_id;
    $impuestos = $data->impuestos;
    $subtotal = $data->subtotal;
    $total = $data->total;
    $direccion = $data->direccion;
    $documento  = $data->documento;



    $sql_insertar_factura ="INSERT INTO facturas (numero_factura,fecha_emision,cliente_id,subtotal,impuestos,total, documento) VALUES ('$numero_factura', '$fecha_emision', '$cliente_id','$subtotal','$impuestos', '$total','$documento')";

    $database->ejecutar($sql_insertar_factura);


    header('Content-Type: application/json');
    echo json_encode(["data"=>'ok']);

}

?>