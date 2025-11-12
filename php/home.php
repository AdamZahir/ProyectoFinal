<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monte Sion | Restaurante Kosher</title>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <link rel="stylesheet" href="estiloHome.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


    <!-- Portada principal -->
    <div class="portada">
        <h1>Kosher, כָּשֵׁר</h1>
        <p>
            Del hebreo <strong>Kashér</strong>, derivado de la palabra <strong>Kashrut (כַּשְׁרוּת)</strong>, 
            que significa “apto”, “adecuado” o “correcto”. En el contexto de la tradición judía, 
            se utiliza para describir los alimentos que cumplen con las leyes dietéticas establecidas en la Torá.
        </p>
    </div>

    <!-- Contenido general -->
    <section class="contenido-general">
        <h2>Cocina Judía Kosher</h2>
        <p>
            En estos tiempos, el término <em>kosher</em> se emplea no solo en un sentido religioso, sino también 
            como sinónimo de algo legítimo, puro o confiable. Sin embargo, su origen está profundamente ligado 
            a las normas espirituales y culturales del judaísmo.
        </p>
        <p>
            La cocina kosher refleja un estilo de vida que busca la pureza espiritual, el respeto, 
            la conciencia en la alimentación y la conexión con las tradiciones del pueblo judío.
        </p>
        <p>
            En <strong>Monte Sion</strong>, honramos esas tradiciones llevando a tu mesa alimentos seleccionados 
            con cuidado, preparados bajo los principios del <em>Kashrut</em> y con el sabor auténtico de la cocina judía.
        </p>
        <p>
            Cada plato es una celebración de la historia, la fe y el buen gusto: una experiencia que nutre 
            el cuerpo y el alma.<br> <br> 
        </p> 
        <h2>Te invitamos a conocer las tradiciones en las que se inspira nuestro menú</h2>
    </section>

    <!-- Carrusel -->
    <section class="carrusel">
        <div class="carrusel-item">
            <img src="imagenes/shabat.jpg" alt="Banner 1" class="imagen-carrusel">
        </div>
        <div class="carrusel-item">
            <img src="imagenes/pesaj.jpg" alt="Banner 2" class="imagen-carrusel">
        </div>
        <div class="carrusel-item">
            <img src="imagenes/januca.jpg" alt="Banner 3" class="imagen-carrusel">
        </div>
        <button class="flecha izquierda">❬</button>
        <button class="flecha derecha">❭</button>
    </section>


    <!-- SECCIÓN DOS -->
    <section class="seccion-dos">
        <div class="contenido-seccion">
            <h2>Kashrut</h2>
            <p>
                Kashrut es un conjunto de normas descritas en el Torá y desarrolladas por la ley judía (Halajá). 
                Determinan los alimentos que se pueden comer y cómo deben prepararse.
            </p>

            <!-- Tarjetas -->
            <div class="tarjetas">
                <div class="tarjeta">
                    <h3>Prohibido:</h3>
                    <ul>
                        <li>◉ Prohíbe el consumo de cerdo y mariscos.</li>
                        <li>◉ Sacrificio ritual para los animales permitidos, realizado de manera compasiva.</li>
                        <li>◉ Eliminación total de la sangre antes de su consumo.</li>
                        <li>◉ Separación entre los alimentos lácteos y la carne.</li>
                    </ul>
                </div>

                <div class="tarjeta">
                    <h3>Permitido:</h3>
                    <ul>
                        <li>◉ Animales con pezuñas hendidas que rumian, como la vaca o el cordero.</li>
                        <li>◉ Aves domésticas como el pollo o el pavo.</li>
                        <li>◉ Pescados con aletas y escamas.</li>
                        <li>◉ Frutas, verduras, granos y legumbres naturales.</li>
                        <li>◉ Productos lácteos, siempre que provengan de animales kosher y no se mezclen con carne.</li>
                    </ul>
                </div>
            </div>
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
        $(document).ready(function() {
            let currentIndex = 0;
            const items = $(".carrusel-item");
            const totalItems = items.length;

            function showItem(index) {
                items.hide();
                items.eq(index).show();
            }

            $(".flecha.derecha").click(function() {
                currentIndex = (currentIndex + 1) % totalItems;
                showItem(currentIndex);
            });

            $(".flecha.izquierda").click(function() {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                showItem(currentIndex);
            });

            // Inicializa el carrusel
            showItem(currentIndex);
        });
            
            
 
    function toggleMenu() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('show');
    }
 
            
            
    </script>

</body>
</html>
