<?php 
require_once 'functions/conection.php';
include_once 'includes/header.php';

if ($pdo) {
    echo "Conexión exitosa a la base de datos.<br>";

    // Ejemplo: Consulta básica para verificar funcionalidad
    $stmt = $pdo->query('SELECT * FROM review LIMIT 1');
    $row = $stmt->fetch();

    if ($row) {
        echo "El id del cliente es: " .$row['id'] ."<br>";
        echo "El nombre del cliente es: " .$row['name_user']."<br>";
        echo "El puntaje de la review es : " .$row['review']."<br>";
        echo "Consulta exitosa. Primer resultado: " . $row['details']."<br>";
        echo "La fecha de la review es : " .$row['date_creation']."<br>";
 




    } else {
        echo "No se encontraron resultados en la consulta.";
    }
} else {
    echo "Error al conectar a la base de datos.";
}



include_once 'includes/footer.php'; 
?>