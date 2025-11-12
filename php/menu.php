<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú | Monte Sion</title>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <link rel="stylesheet" href="estiloMenu.css">
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

    <!-- Contenido del Menú -->
    <div class="menu-container">
        <h1>Menú de Monte Sion</h1>
        <p class="menu-descripcion">Descubre nuestros platillos tradicionales elaborados con dedicación, sabor y respeto por la cultura kosher.</p>

        <!-- Sección Shabat -->
        <section class="menu-category">          
            <h2>SHABAT</h2>
            <hr class="separador">
            <div class="menu-items">
                <div class="menu-card">
                    <img src="imagenes/Challah.jpg" alt="Challah" class="menu-image">
                    <h3>Challah (Jalá)</h3>
                    <p>Un pan trenzado y ligeramente dulce que se comparte en las cenas de Shabat. Simboliza la unidad familiar y la bendición del descanso semanal.</p>
                    <span class="precio">$80 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/Sopa-De-Bolas.jpg" alt="Sopa de bolas de matzá" class="menu-image">
                    <h3>Sopa de bolas de matzá</h3>
                    <p>Una sopa tradicional de pollo con suaves bolas hechas de harina de matzá. Representa el calor del hogar y la tradición familiar.</p>
                    <span class="precio">$120 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/Brisket.jpg" alt="Pechuga de res estofada" class="menu-image">
                    <h3>Pechuga de res estofada (Brisket)</h3>
                    <p>Carne de res cocida lentamente con cebollas, especias y caldo hasta que queda tierna y jugosa. Es un plato clásico del Shabat.</p>
                    <span class="precio">$240 MXN</span>
                </div>
            </div>
        </section>

        <!-- Sección Pésaj -->
        <section class="menu-category">
            <h2>PÉSAJ</h2>
            <hr class="separador">
            <div class="menu-items">
                <div class="menu-card">
                    <img src="imagenes/Gefilte-Fish.jpg" alt="Gefilte Fish" class="menu-image">
                    <h3>Gefilte Fish</h3>
                    <p>Pescado picado y sazonado, moldeado en porciones y servido en gelatina o caldo. Tradición popular durante Pésaj y símbolo de continuidad cultural.</p>
                    <span class="precio">$150 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/Haroset.jpg" alt="Haroset" class="menu-image">
                    <h3>Haroset</h3>
                    <p>Mezcla dulce de manzana, nueces, miel y vino tinto que simboliza el mortero usado por los israelitas en Egipto.</p>
                    <span class="precio">$90 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/Kugel-de-Papa.jpg" alt="Kugel de papa" class="menu-image">
                    <h3>Kugel de papa</h3>
                    <p>Cazuela horneada sin levadura, cumpliendo las normas del Kashrut. Acompañamiento versátil presente en muchas mesas festivas.</p>
                    <span class="precio">$130 MXN</span>
                </div>
            </div>
        </section>

        <!-- Sección Janucá -->
        <section class="menu-category">
            <h2>JANUCÁ</h2>
            <hr class="separador">
            <div class="menu-items">
                <div class="menu-card">
                    <img src="imagenes/latkes.jpg" alt="Latkes" class="menu-image">
                    <h3>Latkes</h3>
                    <p>Buñuelos de papa rallada fritos en aceite, representando el milagro del aceite de ocho días. Se sirven con crema agria o compota de manzana.</p>
                    <span class="precio">$100 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/sufganiyot.jpg" alt="Sufganiyot" class="menu-image">
                    <h3>Sufganiyot</h3>
                    <p>Donas fritas rellenas de mermelada o crema, espolvoreadas con azúcar glass. Conmemoran el milagro de Janucá.</p>
                    <span class="precio">$85 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/burekas.jpg" alt="Burekas" class="menu-image">
                    <h3>Burekas</h3>
                    <p>Pasteles de hojaldre rellenos de queso o espinaca, populares en celebraciones familiares y festividades.</p>
                    <span class="precio">$110 MXN</span>
                </div>
            </div>
        </section>

        <!-- Sección Platillos cotidianos -->
        <section class="menu-category">
            <h2>PLATILLOS COTIDIANOS</h2>
            <hr class="separador">
            <div class="menu-items">
                <div class="menu-card">
                    <img src="imagenes/shakshuka.jpg" alt="Shakshuka" class="menu-image">
                    <h3>Shakshuka</h3>
                    <p>Huevos escalfados en una salsa espesa de tomate, pimientos y cebolla. Un desayuno popular en la cocina sefardí.</p>
                    <span class="precio">$140 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/falafel.jpg" alt="Falafel" class="menu-image">
                    <h3>Falafel</h3>
                    <p>Bolas fritas de garbanzos molidos con especias. Clásico de la comida callejera israelí y opción vegetariana muy popular.</p>
                    <span class="precio">$110 MXN</span>
                </div>
                <div class="menu-card">
                    <img src="imagenes/hummus.jpg" alt="Hummus" class="menu-image">
                    <h3>Hummus</h3>
                    <p>Puré cremoso de garbanzos con tahini y limón. Ideal para acompañar pan pita o verduras frescas.</p>
                    <span class="precio">$90 MXN</span>
                </div>
            </div>
        </section>
    </div>

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
                    <a href="#" class="icono facebook"></a>
                    <a href="#" class="icono instagram"></a>
                    <a href="#" class="icono twitter"></a>
                    <a href="#" class="icono whatsapp"></a>
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
