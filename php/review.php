<?php
session_start(); // Asegura que la sesión está iniciada

// Configura la zona horaria para que la hora se guarde correctamente
date_default_timezone_set('America/Mexico_City'); // Establece la zona horaria correcta

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

// Lógica para guardar el comentario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['nombre'])) {
    if (isset($_SESSION['id'])) {
        $usuario_id = $_SESSION['id']; // ID del usuario de la sesión
        $comentario = $_POST['comentario'];
        $calificacion = $_POST['calificacion'];

        // comentario no esté vacío
        if (!empty($comentario) && !empty($calificacion)) {
        
            $sql = "INSERT INTO comentarios (usuario_id, comentario, calificacion, fecha)
                    VALUES ('$usuario_id', '$comentario', '$calificacion', CURDATE())";

            if ($conn->query($sql) === TRUE) {
                $mensajeError = "Comentario guardado con éxito.";
            } else {
                $mensajeError = "Error al guardar el comentario. Intenta más tarde.";
            }
        } else {
            $mensajeError = "Por favor, ingresa un comentario y una calificación.";
        }
    } else {
        $mensajeError = "No estás logueado. Inicia sesión para dejar un comentario.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas | Monte Sion</title>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">
        
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="estiloReview.css">
</head>
<body>

    <!-- Encabezado -->
 <header>
        <div class="logo">
            <img src="imagenes/logo-completo.png" alt="Logo del restaurante">
        </div>

        <div class="botones">
            <?php if (isset($_SESSION['nombre'])): ?>
                <form action="logout.php" method="POST" style="display:inline;">
                    <button type="submit"><i class="fas fa-sign-out-alt"></i><span>Cerrar sesión</span></button>
                </form>
            <?php else: ?>
                <a href="login.php"><button><i class="fas fa-sign-in-alt"></i><span>Iniciar sesión</span></button></a>
                <a href="registro.php"><button><i class="fas fa-user-plus"></i><span>Registrarse</span></button></a>
            <?php endif; ?>
        </div>
    </header>


    <!-- Menú principal -->
    <nav>
        <div class="menu-hamburguesa" onclick="toggleMenu()">
            <i class="fas fa-bars"></i> <!-- Icono hamburguesa -->
        </div>
        <ul id="menu" class="menu">
            <li><a href="home.php">Inicio</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="review.php">Reseñas</a></li>
            <li><a href="SobreNosotros.php">Sobre Nosotros</a></li>
        </ul>
    </nav>

    <!-- Banner de reseñas -->
    <div class="portada">
        <h1>Reseñas a Monte Sion</h1>
        <p>
            <?php if (isset($_SESSION['nombre'])): ?>
                Estás comentando como <?php echo $_SESSION['nombre']; ?>
            <?php else: ?>
                Para poder comentar, tienes que <a href="login.php"><b style="color:#FACC15;">iniciar sesión</b></a> o <a href="registro.php"><b style="color:#FACC15;">crear una cuenta</b></a>.
            <?php endif; ?>
        </p>
    </div>

    <!-- Formulario para comentar -->
    <?php if (isset($_SESSION['nombre'])): ?>
    <section class="contenido-general">
        <h2>Déjanos tu opinión</h2>

        <form method="POST" action="review.php">
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" required></textarea><br>

            <label for="calificacion">Calificación (1-5 estrellas):</label>
            <select id="calificacion" name="calificacion" required>
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select><br>

            <button class="boton-enviar" type="submit">Enviar Comentario</button>
        </form>

        <?php if (!empty($mensajeError)): ?>
            <p class="error"><?php echo $mensajeError; ?></p>
        <?php endif; ?>
    </section>
    <?php endif; ?>

    <!-- Mostrar comentarios anteriores -->
    <section class="comentarios">
        <h2>Comentarios Recientes</h2>
        <?php
        // Conectar de nuevo para mostrar los comentarios
        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener los comentarios
        $sql = "SELECT c.comentario, c.calificacion, c.fecha, r.nombre_completo 
                FROM comentarios c
                JOIN registrados r ON c.usuario_id = r.id
                ORDER BY c.fecha DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Formatear la fecha para mostrar solo el día, mes y año (sin la hora)
                $fecha_formateada = date("d/M/Y", strtotime($row['fecha'])); // 05/Nov/2025
                echo "<div class='comentario'>";
                echo "<p><strong>" . $row['nombre_completo'] . " - " . $fecha_formateada . "</strong></p>";
                echo "<p><strong>Calificación:</strong> ";
                $calificacion = $row['calificacion'];
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $calificacion) {
                        echo "⭐"; // Emoji de estrella llena
                    } else {
                        echo "☆"; // Emoji de estrella vacía
                    }
                }
                echo "</p>";
                echo "<p>" . $row['comentario'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay comentarios aún.</p>";
        }

        $conn->close();
        ?>
    </section>

    <!-- Footer -->
    <footer>
    <div class="footer-contenedor">
        <div class="footer-logo">
            <img src="imagenes/Logo footer.png" alt="Logo Monte Sion">
            <p>Monte Sion — Tradición y sabor kosher.</p>
        </div>

        <div class="footer-contacto">
            <h3>Contáctanos</h3>
            <p>📍 Calle del Monte 123, Cd. Juárez</p>
            <p>📞 +52 656 1010 100</p>
            <p>✉️ RestauranteSion@gmail.com</p>
            <p>🕒 Lun - Dom: 10:00 a 22:00</p>
        </div>

        <div class="footer-redes">
            <h3>Síguenos</h3>
            <div class="iconos-redes">
                <a href="#" class="icono facebook" aria-label="Facebook"></a>
                <a href="#" class="icono instagram" aria-label="Instagram"></a>
                <a href="#" class="icono twitter" aria-label="Twitter/X"></a>
                <a href="#" class="icono whatsapp" aria-label="WhatsApp"></a>
            </div>
        </div>
    </div>

    <div class="footer-derechos">
        <p>© <?php echo date('Y'); ?> Restaurante Monte Sion. Todos los derechos reservados.</p>
    </div>
</footer>

<script>
function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('show'); // Alterna la visibilidad del menú
}
</script>

</body>
</html>
