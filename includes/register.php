<?php
include '../functions/conection.php';

$nameTable = "users";
$redirectURL = "../index.php";
$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numId = filter_input(INPUT_POST, 'numId', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass']; 
    $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO $nameTable (numId, name, email, pass) VALUES (?, ?, ?, ?)";

    try {
        $stmt = ejecutarConsulta($sql, [$numId, $name, $email, $pass_hashed]);

        if ($stmt->rowCount() > 0) {
            $mensaje = "Registro exitoso";
            viewAlert($mensaje);
            $redirectURL = "../includes/login.php";
            header("Refresh: 1; URL=".$redirectURL);
        } else {
            $mensaje = "Error al registrarse, intente nuevamente";
        }
    } catch (PDOException $e) {
        $mensaje = "Error en la base de datos, por favor inténtelo más tarde";
        error_log('Error en la base de datos: ' . $e->getMessage());
    }
}

function viewAlert($message) {
    echo '<script>alert("' . $message . '");</script>';
}
?>
