<?php
if (!isset($_COOKIE["clave"])) {
    header("Location: ./pages/login.php");
 }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Facturación</title>
    <!-- <link rel="stylesheet" href="estilos.css"> -->
   <!--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="max-w-3xl m-auto  bg-[#202b38]  text-white">
    
    <header class="h-24 flex justify-center items-center">
        <h1 class="text-2xl  ">Bienvenido al Sistema de Facturación</h1>
    </header>
    <nav class="border-2 border-white m-auto rounded-lg p-4">
        <ul class="flex justify-center items-center gap-4">
            <li><a href="index.php" class="block hover:scale-125 hover:text-cyan-400  ease-in duration-300">Inicio</a></li>
            <li><a href="./pages/registrar" class="block hover:scale-125 hover:text-cyan-400  ease-in duration-300" > Registro</a></li>
            <li  ><a href="./pages/inventario" class="block hover:scale-125 hover:text-cyan-400  ease-in duration-300">Inventario</a></li>
            <!-- Agrega más enlaces de navegación según tus necesidades -->
        </ul>
    </nav>
    <section>
        <img src="./img/factura.png" alt="" class="m-auto">
    </section>
    <main>
        <!-- Contenido principal de la página de inicio -->
    </main>
    <footer>
        <p>&copy; 2023 Sistema de Facturación</p>
    </footer>
</body>

</html>