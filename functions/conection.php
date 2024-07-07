<?php
$host = 'localhost'; 
$dbname = 'top_motos'; 
$username = 'root'; 
$password = ''; 

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        PDO::ATTR_EMULATE_PREPARES => false, 
    ];

    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql, $parametros = []) {
        global $pdo;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($parametros);
        return $stmt;
    }
}

