<?php
session_start(); // GUARDA LA SESIÓN

// CONEXIÓN A LA BASE
$host = "fdb1034.awardspace.net";
$user = "4667282_votacionespagina";
$pass = "tn9mDRYxtEeSKG!";
$db   = "4667282_votacionespagina";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// LÓGICA DEL FORMULARIO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM registrados WHERE correo = '$correo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // VERIFICA CONTRASEÑA
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['nombre'] = $usuario['nombre_completo'];
            $_SESSION['correo'] = $usuario['correo'];

            // ENTRAR A LA PÁGINA PRINCIPAL
            header("Location: home.php");
            exit();
        } else {
            $mensajeError = "Contraseña incorrecta.";
        }
    } else {
        $mensajeError = "No existe una cuenta con ese correo.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<main>
  <div class="contenedor-formulario">
    <h1>Iniciar Sesión</h1>

    <form method="POST" action="">
        <label>Correo electrónico:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>

        <button class="enviar" type="submit">Entrar</button>

        <p class="registro-texto">
          ¿No tienes cuenta?
          <a href="registro.php">Regístrate aquí</a>
        </p>

        <?php if (!empty($mensajeError)): ?>
            <p class="error"><?php echo $mensajeError; ?></p>
        <?php endif; ?>
    </form>
  </div>
</main>

</body>
</html>
