<?php
require_once '../db/Database.php';

$database = new Database();
$conexion = $database->conectar();

$sql = "SELECT serieID FROM facturas ORDER BY id_factura DESC LIMIT 1";

$res = $database->obtener($sql);

$serieID= intval($res[0]['serieID']);
$response = [
    "serieID" =>  $serieID
];

header("Content-Type: application/json");

echo json_encode($response)

?><