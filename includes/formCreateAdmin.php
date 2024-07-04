<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACA Duvan Vargas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<main>
    
<section id="home">
            <h2>Registra tus datos de contacto</h2>
            <form action="../functions/addUser.php" method="POST">

                <label for="numId">Nombre del administrador</label>
                <input type="text" id="nameAdmin" name="nameAdmin" required>

                <label for="numId">Identificacion del administrador:</label>
                <input type="text" id="idAdmin" name="idAdmin" required>

                <label for="email">Email del administrador:</label>
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
