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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // VERIFICAR CORREO
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

<!-- FORMULARIO ------------ -->
<main>
  <div class="contenedor-formulario">
    <form method="POST" action="">
        <label>Nombre Completo:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Carrera Universitaria:</label><br>
        <input type="text" name="carrera" required><br><br>

        <label>Correo electrónico:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>

        <button class="enviar" type="submit">Entrar</button>

        <p class="registro-texto">
            ¿Ya tienes cuenta? 
            <a href="login.php">Inicia sesión aquí</a>
        </p>

        <!-- Mostrar mensaje de error -->
        <?php if (!empty($mensajeError)): ?>
            <p style="color:red; font-weight:bold;"><?php echo $mensajeError; ?></p>
        <?php endif; ?>
    </form>
  </div>
</main>
