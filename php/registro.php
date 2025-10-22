<?php
// CONECTAR A LA BASE
$host = "fdb1034.awardspace.net";
$user = "4667282_votacionespagina";
$pass = "tn9mDRYxtEeSKG!";
$db   = "4667282_votacionespagina";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensajeError = "";

// LÓGICA DEL FORMULARIO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // VERIFICAR SI EL CORREO YA EXISTE
    $verificar = $conn->query("SELECT * FROM registrados WHERE correo = '$correo'");

    if ($verificar->num_rows > 0) {
        $mensajeError = "Este correo ya está en uso.";
    } else {
        $sql = "INSERT INTO registrados (nombre_completo, carrera, correo, contrasena)
                VALUES ('$nombre', '$carrera', '$correo', '$contrasena')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: login.php");
            exit();
        } else {
            $mensajeError = "Error al registrarte. Intenta más tarde.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<main>
  <div class="contenedor-formulario">
    <h1>Registrarse</h1>

    <form method="POST" action="">
        <label>Nombre Completo:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Carrera Universitaria:</label><br>
        <input type="text" name="carrera" required><br><br>

        <label>Correo electrónico:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>

        <button class="enviar" type="submit">Registrarse</button>

        <p class="registro-texto">
            ¿Ya tienes cuenta? 
            <a href="login.php">Inicia sesión aquí</a>
        </p>

        <?php if (!empty($mensajeError)): ?>
            <p class="error"><?php echo $mensajeError; ?></p>
        <?php endif; ?>
    </form>
  </div>
</main>

</body>
</html>
