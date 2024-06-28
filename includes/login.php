<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <form action="../functions/validateLogin.php" method="post">
            <label for="email">Correo Electrónico: </label>
            <input type="text" name="email" class="email" id="email" placeholder="email: ejemplo@gmail.com" required>
            <br>
            <div class="password-container">
                <label for="password">Contraseña: </label>
                <input type="password"class="password" name="password" id="password" placeholder="Clave: 11212" required>
                <button type="button" class="toggle-password" onclick="togglePassword()">👀</button>
            </div>
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>
