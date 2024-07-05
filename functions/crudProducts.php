<?php
include 'conection.php';
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];
    $id = $_POST['id'];

    switch ($accion) {
        case 'editar':
            // Lógica para editar el registro
            // Puedes redirigir a un formulario de edición con los datos pre-cargados
            break;
        
        case 'eliminar':
            // Lógica para eliminar el registro
            // Realiza la consulta de eliminación en la base de datos
            $sql = "DELETE FROM productos WHERE id = ?";
            ejecutarConsulta($sql, [$id]);
            mostrarMensajeRegistroExitoso("Producto eliminado Exitosamente","Da click en volver","../includes/sellers.php","Volver");
            break;
        
        default:
            // Acción no válida
            break;
    }

}
?>
