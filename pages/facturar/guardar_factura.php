<?php
 require_once "../../db/Database.php";


 if (isset($_POST["guardar"])) {
    $DB = new Database();

    $conexion = $DB->conectar();
    $sql="SELECT * FROM `clientes`";
    $DB->ejecutar($sql);
    
    // Definir los datos de la factura
    $numero_factura = $_POST["numero_factura"];
    $fecha_emision = $_POST["fecha_emision"];
    $cliente_id = 3; // ID del cliente en la base de datos
    
    $producto_id = $_POST["producto_id"];
    $producto_id = $_POST["cantidad"];

    $subtotal = 



    // Insertar la factura en la base de datos
    $sql = "INSERT INTO facturas (numero_factura, fecha_emision, cliente_id) VALUES ('$numero_factura', '$fecha_emision', $cliente_id)";
    $data =  $DB->ejecutar($sql);
        
    


 }


?>