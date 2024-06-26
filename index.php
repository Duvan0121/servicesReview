<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Duvan</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Top Motos "Eleva tu conducción a la cima."</h1>
        <nav>
            <ul>
                <li><a href="#home">Inicio</a></li>
                <li><a href="#about">Sobre Nosotros</a></li>
                <li><a href="includes/login.php">Iniciar Sesion </a></li>
                <li><a href="#register">Registrarse</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <section id="home">
    <div class="container">
        <h2>Sección de Inicio</h2>
        <h3>Si estás con ganas de comprar una motocicleta y no sabes cuál escoger, te ofrecemos los siguientes beneficios:</h3>
        <ul class="benefits-list">
            <li>Imágenes detalladas de las motocicletas</li>
            <li>Altura de la motocicleta</li>
            <li>Peso de la motocicleta</li>
            <li>Autonomía de combustible</li>
            <li>Tipo de motocicleta</li>
        </ul>
    </div>
</section>


        <section id="about">
            <h2>Sobre Nosotros</h2>
            <p>Si estás en busca de la mejor moto que se adecúe a tus necesidades y presupuesto, puedes contar con nosotros. Somos una empresa con más de 10 años en el mercado de motos colombiano. La empresa fue fundada en el año 1989 y, tras el paso de los años, se ha convertido en un estándar para decidir qué moto comprar. Nuestro compromiso es brindarte opciones de alta calidad y asesorarte en cada paso del proceso. Además, contamos con un equipo de expertos en motocicletas que están dispuestos a responder tus preguntas y ayudarte a tomar la mejor decisión. Ya sea que busques una moto deportiva, una scooter o una todoterreno, estamos aquí para guiarte en tu elección. No importa si eres un principiante o un conductor experimentado, nuestra amplia gama de modelos te ofrece opciones para todos los gustos y necesidades. ¡Ven a visitarnos y descubre la moto perfecta para ti!


            </p>
        </section>

        <section id="register">
            <h2>Registrarse</h2>
            <form action="includes/register.php" method="POST">

                <label for="numId">Número de documento:</label>
                <input type="text" id="numId" name="numId" required>

                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="email">Contraseña:</label>
                <input type="password" id="pass" name="pass" required>


                <button type="submit">Registrarse</button>
            </form>
        </section>
    </main>

    <footer>
    <!--<p>&copy; <?php echo date("Y"); ?> Nuestra Empresa. Todos los derechos reservados.</p>-->
    <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>
</html>
