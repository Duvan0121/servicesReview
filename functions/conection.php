<?php
// Datos de conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu base de datos está en un servidor diferente
$dbname = 'proyectouniversidad'; // Cambia esto al nombre de tu base de datos
$username = 'root'; // Cambia esto al usuario de tu base de datos
$password = ''; // Cambia esto a la contraseña de tu base de datos

try {
    // Establecer la conexión usando PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activar manejo de errores
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Obtener resultados como arrays asociativos
        PDO::ATTR_EMULATE_PREPARES => false, // Desactivar emulación de preparación de consultas
    ];

    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // En caso de error al conectar, muestra un mensaje y termina la ejecución
    die("Error de conexión: " . $e->getMessage());
}

// Opcional: Función para ejecutar consultas SQL preparadas
function ejecutarConsulta($sql, $parametros = []) {
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($parametros);
    return $stmt;
}