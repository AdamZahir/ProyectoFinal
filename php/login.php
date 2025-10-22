<?php
session_start(); // GUARDA LA SESION

// CONEXION A LA BASE 
$host = "fdb1034.awardspace.net";
$user = "4667282_votacionespagina";
$pass = "tn9mDRYxtEeSKG!";
$db   = "4667282_votacionespagina";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM registrados WHERE correo = '$correo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // VERIFICA LA CONTRASEÑAA----------------------------------
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['nombre'] = $usuario['nombre_completo'];
            $_SESSION['correo'] = $usuario['correo'];

                
    // ENTRAR A LA PAGINA
            header("Location: home.html");
            exit(); 
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No existe una cuenta con ese correo.";
    }
}

$conn->close();
?>

<!-- FORMULARIO --------------- -->
<form method="POST" action="">
    <label>Correo electrónico:</label><br>
    <input type="email" name="correo" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="contrasena" required><br><br>

   <button class="enviar" type="submit">Entrar</button>

<p class="registro-texto">
¿No tienes cuenta?
<a href="registro.php">Registrate aquí</a>
</p>
     
        
        
</form>
