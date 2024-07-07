<?php
include_once 'conection.php';
require '../functions/functions.php';

session_start();

// Verificar sesión iniciada
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    mostrarMensajeRegistroExitoso("No iniciaste sesión o ha expirado", "Por favor realiza el login", "../includes/login.php", "Ir al login");
    exit;
}

// Procesar formulario enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form = $_POST['control'];

    // Variables para cada formulario
    $nameTable = "";
    $camposSql = [];
    $valoresSql = [];

    switch ($form) {
        case "admin":
            $nameTable = "administrators";
            $id = filter_input(INPUT_POST, 'idAdmin', FILTER_SANITIZE_NUMBER_INT);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $name = filter_input(INPUT_POST, 'nameAdmin', FILTER_SANITIZE_STRING);
            $pass = $_POST['pass'];
            $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
            $camposSql = ["id", "email", "name", "password"];
            $valoresSql = [$id, $email, $name, $pass_hashed];
            break;

        case "motorcycle":
            $nameTable = "motorcycles";
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $price = $_POST['price'];
            $pathImage = $_POST['pathImage'];
            $camposSql = ["id", "nameMotorcycle", "descriptionMotorcycle", "priceMotorcycle", "pathImage"];
            $valoresSql = [$id, $name, $description, $price, $pathImage];
            break;

        case "contact":
            $nameTable = "contacts";
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $cellPhone = filter_input(INPUT_POST, 'cellPhoneNumber', FILTER_SANITIZE_NUMBER_INT);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);
            $camposSql = ["id", "cellPhoneNumber", "userName", "userEmail", "userDetails"];
            $valoresSql = [$id, $cellPhone, $name, $email, $details];
            break;

        default:
            header("Location: logout.php");
            exit;
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO $nameTable (" . implode(', ', $camposSql) . ") VALUES (" . rtrim(str_repeat('?, ', count($valoresSql)), ', ') . ")";

    try {
        // Ejecutar la consulta
        $stmt = ejecutarConsulta($sql, $valoresSql);

        if ($stmt->rowCount() > 0) {
            mostrarMensajeRegistroExitoso("Información registrada exitosamente", "Ya puede gestionar este nuevo registro", "../includes/principalAdmin.php", "Regresar al panel");
        } else {
            mostrarMensajeRegistroExitoso("ERROR EN LA BASE DE DATOS", "Intente nuevamente", "../includes/logout.php", "Reiniciar");
        }
    } catch (PDOException $e) {
        mostrarMensajeRegistroExitoso("ERROR EN LA BASE DE DATOS", $e->getMessage(), "../includes/logout.php", "Reiniciar");
    }
}
?>
