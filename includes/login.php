<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <main>
        <section id="login">
            <h2>Iniciar Sesion</h2>
            <form action="../functions/validateLogin.php" method="POST" id="login-form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <div class="button-container">
                    <button type="submit">Iniciar Sesión</button>
                    <button type="button" onclick="window.location.href='../index.php';" id="volver-button">Volver</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <!--<p>&copy; <?php echo date("Y"); ?> Nuestra Empresa. Todos los derechos reservados.</p>-->
        <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>

</html>
