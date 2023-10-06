<?php
require_once '../db/Database.php';

// Crear una instancia de la clase Database para la conexión a la base de datos.
$database = new Database();
$conexion = $database->conectar();

// Habilita la recepción de solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'));


    $cliente_id = $data->cliente_id;
    $producto_id = $data->producto_id;
    $nombre = $data->nombre;
    $numero_factura = $data->numero_factura;
    $fecha_emision = $data->fecha_emision;
    $impuestos = $data->impuestos;
    $subtotal = $data->subtotal;
    $total =$data->total;
    $direccion = $data->direccion;
    $documento  = $data->documento;
    $datosTablaProductos = $data->datosTablaProductos;
    $serieID= $data->serieID;
    $razon_social= $data->razon_social;
    
    $documento_parse_int = intval($documento);

   $sql_create_client;
    if($cliente_id == 0){
        $sql_create_client = "insert into clientes (nombre,direccion,ruc,razon_social,dni) values(
            '$nombre','$direccion','no definido','no definido','$documento_parse_int')
        )";
       /*  if(strlen(intval($documento)) == 8){

        }
        if(strlen(intval($documento)) == 11){
            $sql_create_client = "insert into clientes (nombre,direccion,ruc,razon_social,dni) values(
                '$nombre','$direccion','$documento','$razon_social','no definido')";
        } */
        $res_created_client = $database->ejecutar($sql_create_client); 
    }

       




    /* $sql_insertar_factura ="INSERT INTO facturas (numero_factura,fecha_emision,cliente_id,subtotal,impuestos,total, documento,serieID, razon_social) VALUES ('$numero_factura', '$fecha_emision', '$cliente_id','$subtotal','$impuestos', '$total','$documento','$numero_factura','$razon_social')";

    $database->ejecutar($sql_insertar_factura);
    
    
    $sql_ultimo_id = "SELECT id_factura FROM facturas ORDER BY id_factura DESC LIMIT 1";
    $res = $database->obtener($sql_ultimo_id);

    $id_factura =intval($res[0]['id_factura']);


    foreach($datosTablaProductos as $producto){
        $cantidad= intval($producto->cantidad);
        $producto_id = intval($producto->producto_id);
        $precio_unitario= intval($producto->precio_unidad);
        $importe = intval($producto->importe);

        $sql_insertar_factura_detalles = "INSERT INTO detalle_factura (factura_id, producto_id,cantidad,precio_unitario,subtotal) values ('$id_factura','$producto_id','$cantidad','$precio_unitario','$importe')";

        $database->ejecutar($sql_insertar_factura_detalles);
 

    }

 */

    $response =[
        "a"=>$cliente_id,
        "b"=>$producto_id,
        "c"=>$nombre,
        "d"=>$direccion,
    ];



    header("Content-Type: application/json");

    echo json_encode(["data"=>"OK"]);

}

?>