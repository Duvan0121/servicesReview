<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACA Duvan Vargas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Top Motos "La mejor moto según tus necesidades"</h1>
        <nav>
            <ul>
                <li><a href="#home">Inicio</a></li>
                <li><a href="#about">Sobre Nosotros</a></li>
                <li><a href="includes/login.php">¿Eres vendedor?</a></li>
                <li><a href="#contact">¿Quieres que te contactemos?</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <div class="container">
                <h2>Sección de Inicio</h2>
                <h3>Si estás con ganas de comprar una motocicleta y no sabes cuál escoger, te ofrecemos los siguientes
                    servicios:</h3>
                <ul class="benefits-list">
                    <li>Imágenes detalladas de las motocicletas</li>
                    <li>Altura de la motocicleta</li>
                    <li>Peso de la motocicleta</li>
                    <li>Autonomía de combustible</li>
                    <li>Tipo de motocicleta</li>
                </ul>

                <button type="button" onclick="window.location.href='includes/products.php';">Ver
                    Motocicletas🏍️🛵</button>

            </div>
        </section>

        <section id="about">
            <h2>Sobre Nosotros</h2>
            <p>Si estás en busca de la mejor moto que se adecúe a tus necesidades y presupuesto, puedes contar con
                nosotros. Somos una empresa con más de 10 años en el mercado de motos colombiano. La empresa fue fundada
                en el año 1989 y, tras el paso de los años, se ha convertido en un estándar para decidir qué moto
                comprar. Nuestro compromiso es brindarte opciones de alta calidad y asesorarte en cada paso del proceso.
                Además, contamos con un equipo de expertos en motocicletas que están dispuestos a responder tus
                preguntas y ayudarte a tomar la mejor decisión. Ya sea que busques una moto deportiva, una scooter o una
                todoterreno, estamos aquí para guiarte en tu elección. No importa si eres un principiante o un conductor
                experimentado, nuestra amplia gama de modelos te ofrece opciones para todos los gustos y necesidades.
                ¡Ven a visitarnos y descubre la moto perfecta para ti!</p>
        </section>

        <section id="contact">
            <h2>Registra tus datos de contacto</h2>
            <form action="functions/addAdministrator.php" method="POST" id="login-form">

                <label for="name">Identificación:</label>
                <input type="number" id="id" name="id" required>

                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>

                <label for="cellPhoneNumber">Número de contacto(Celular):</label>
                <input type="text" id="cellPhoneNumber" name="cellPhoneNumber" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="details">Detalles:</label>
                <textarea id="details" name="details" rows="5"
                    placeholder="Escribe los detalles de tu consulta"></textarea>

                <button type="submit">Registrar mis datos de contacto!!</button>

            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>

</html>