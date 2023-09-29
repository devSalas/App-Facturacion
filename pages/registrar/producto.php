<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto - Sistema de Facturación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./producto.css">
</head>
<body class="m-auto">
    <header>
        <h1 class="text-2xl text-center p-4" >Agregar Productos</h1>
    </header>
    <nav class="border-2 border-white m-auto rounded-lg p-4">
        <ul class="flex justify-center items-center gap-4">
            <li><a href="../../index.php" class="block hover:scale-125 hover:text-cyan-400  ease-in duration-300">Inicio</a></li>
            <li><a href="index.php" class="block hover:scale-125 hover:text-cyan-400  ease-in duration-300" > Registro</a></li>
            <li  ><a href="Lista_producto.php" class="block hover:scale-125 hover:text-cyan-400  ease-in duration-300">inventario</a></li>
            <!-- Agrega más enlaces de navegación según tus necesidades -->
        </ul>
    </nav>
    <main>
        <form method="POST" action="../../services/Procesar_producto.php" >
            <label for="nombre">Nombre del Producto:</label>
            <input class="text-black p-2" type="text" name="nombre" required><br><br>

            <label for="descripcion">Descripción:</label>
            <textarea class="text-black p-2" name="descripcion"></textarea><br><br>

            <label for="precio">Precio:</label>
            <input class="text-black p-2" type="number" name="precio" step="0.01" required><br><br>

            <label for="stock">Stock:</label>
            <input class="text-black p-2" type="number" name="stock" required><br><br>

            <input class="bg-slate-700" type="submit" name="agregar" value="Agregar Producto">
        </form>
    </main>
    <footer>
        <p>&copy; 2023 Sistema de Facturación</p>
    </footer>
</body>
</html>
