<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros | Monte Sion</title>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
 
    <link rel="stylesheet" href="estiloNosotros.css">
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

        
        
        

    <!-- SECCIÓN SOBRE NOSOTROS -->
    <section class="sobre-nosotros">
        <div class="sobre-texto">
            <h2>Tradición y Sabor</h2>
           <!--    <h2> <span style="color: #FACC15;">Sobre Nosotros:</span> Tradición y Sabor</h2> --->

            <p>
               <strong> Monte Sion   </strong>  se preocupa por el alimento que nutre tu cuerpo y tu alma. 
                Nuestro restaurante kosher nació con la misión de ofrecer una experiencia culinaria auténtica, 
                respetando los valores y tradiciones que nos definen.
            </p>
            <p>
                Cada platillo es preparado con ingredientes frescos y supervisión cuidadosa, 
                siguiendo los estándares kosher para garantizar pureza, respeto y calidad. 
                Nos enorgullece ser un espacio familiar donde la comunidad puede reunirse, compartir y disfrutar.
            </p>
            <p>
                Desde nuestras raíces en Ciudad Juárez, hemos trabajado para mantener viva la esencia 
                de la cocina tradicional, adaptándola a los gustos contemporáneos sin perder su significado espiritual.
            </p>
        </div>

        <div class="sobre-imagen">
            <img src="imagenes/ficha.png" alt="Ficha Programador">
        </div>
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
        menu.classList.toggle('show');
    }
</script>

</body>
</html>
