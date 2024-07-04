<?php
include 'conection.php';

$nameTable = "sellers";
$redirectURL = "../index.php";
$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass']; 
    $name = filter_input(INPUT_POST, 'nameAdmin', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'idAdmin', FILTER_SANITIZE_NUMBER_INT);
    $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO $nameTable (idAdmin, nameAdmin, emailAdmin, passwordAdmin) VALUES (?, ?,?,?)";

    try {
        $stmt = ejecutarConsulta($sql, [$id,$name,$email, $pass_hashed]);

        if ($stmt->rowCount() > 0) {
            $mensaje = "Registro de administrador exitoso";
            viewAlert($mensaje);
            $redirectURL = "../includes/sellers.php";
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