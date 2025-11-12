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
    <title>Registro | Monte Sion</title>
         <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilodoble.css">
</head>
<body>

  <div class="contenedor-padre">
      <h1>Registrate</h1>

      <form class="formulario" method="POST" action="">
        <label>Nombre Completo:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Carrera Universitaria:</label>
        <input type="text" name="carrera" required><br><br>

        <label>Correo electrónico:</label>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>

        <button class="enviar" type="submit">Registrarse</button>

        <p class="registro-texto">
            ¿Ya tienes cuenta? 
            <a href="login.php">Inicia sesión aquí</a>
        </p>

        <?php if (!empty($mensajeError)): ?>
            <p class="error"><?php echo $mensajeError; ?></p>
        <?php endif; ?>
        </div>          
      </form>
    </div>

</body>
</html>
