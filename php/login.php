<?php
session_start(); 

// Conexión a la base de datos
$host = "fdb1034.awardspace.net";
$user = "4667282_votacionespagina";
$pass = "tn9mDRYxtEeSKG!";
$db = "4667282_votacionespagina";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensajeError = "";

// Lógica del formulario para iniciar sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM registrados WHERE correo = '$correo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Guarda los datos del usuario en la sesión
            $_SESSION['nombre'] = $usuario['nombre_completo'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['id'] = $usuario['id']; 

            // Redirige a la página de inicio
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
         <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilodoble.css">
</head>
<body>

<main>
  <div class="contenedor-padre">
      <h1>Inicia sesión</h1>

      <form class="formulario" method="POST" action="">
        <label>Correo electrónico:</label>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>

        <button class="enviar" type="submit">Entrar</button>

        <p class="registro-texto">
          ¿No tienes cuenta?
          <a href="registro.php">Regístrate aquí</a>
        </p>

        <?php if (!empty($mensajeError)): ?>
            <p class="error"><?php echo $mensajeError; ?></p>
        <?php endif; ?>
        </div>          
      </form>
    </div>
</main>

</body>
</html>
