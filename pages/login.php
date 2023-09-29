<?php
if (isset($_COOKIE["clave"])) {
   header("Location: panel.php");
}
// Incluye el archivo que contiene la clase Database
require_once "../db/Database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crea una instancia de la clase Database
    $db = new Database();

    // Llama al método conectar para establecer la conexión
    $conexion = $db->conectar();

    if ($conexion) {
        // Recuperar datos del formulario
        echo "no entro";
        $correo = $_POST["correo"];
        $clave = $_POST["clave"];

        // Consulta para verificar las credenciales
        $consulta = "SELECT * FROM `usuario` WHERE correo = '$correo' AND clave = '$clave'";

        $resultado = $db->obtener($consulta);

        if ($resultado) {
            // Inicio de sesión exitoso
            $nombreCookie = "clave";
            $valorCookie = "$clave";
            $expiracion = time() + (30 * 24 * 60 * 60); // 30 días en segundos
            setcookie($nombreCookie, $valorCookie, $expiracion, "/");
            

            $_SESSION["usuario"] = $usuario;
            header("Location: panel.php");
            exit();
        } else {
            // Credenciales incorrectas
            $error = "Usuario o contraseña incorrectos";
        }
    } else {
        $error = "Error de conexión a la base de datos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) { ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php } ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="correo">Usuario:</label>
                <input type="text" name="correo" required>
            </div>
            <div class="form-group">
                <label for="clave">Contraseña:</label>
                <input type="password" name="clave" required>
            </div>
            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
