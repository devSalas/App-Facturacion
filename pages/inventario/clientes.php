<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>


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