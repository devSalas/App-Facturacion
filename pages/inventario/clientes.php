<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body style="max-width:1000px;margin:auto">
<div>
        <a href="../../index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" style="fill: black; "><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
        </a>
        </div>

    <h1 class="py-5 text-center text-3xl">Clientes</h1>

<?php
 require_once '../../db/Database.php';

 $DB = new Database();
$conexion = $DB->conectar();

if($conexion){
    $resultados = $DB->obtener("SELECT * FROM `clientes`");
    if ($resultados) {
        echo '<div class="container mx-auto">';
        echo '<table class="min-w-full table-auto">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="bg-blue-500 text-white font-bold py-2 px-4">ID</th>';
        echo '<th class="bg-blue-500 text-white font-bold py-2 px-4">Nombre</th>';
        echo '<th class="bg-blue-500 text-white font-bold py-2 px-4">Dirección</th>';
        echo '<th class="bg-blue-500 text-white font-bold py-2 px-4">Telefono</th>';
        echo '<th class="bg-blue-500 text-white font-bold py-2 px-4">correo electronico</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($resultados as $fila) {
            echo '<tr>';
            echo '<td class="border px-4 py-2">' . $fila['id'] . '</td>';
            echo '<td class="border px-4 py-2">' . $fila['nombre'] . '</td>';
            echo '<td class="border px-4 py-2">' . $fila['direccion'] . '</td>';
            echo '<td class="border px-4 py-2">' . $fila['telefono'] . '</td>';
            echo '<td class="border px-4 py-2">' . $fila['email'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p class="text-red-500">No se encontraron resultados.</p>';
    }
} else {
    echo '<p class="text-red-500">Error de conexión a la base de datos.</p>';
}



?>


</body>
</html>