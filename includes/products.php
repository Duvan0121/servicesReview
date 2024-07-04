<?php

session_start();


/*if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit; 
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="../css/products.css">
</head>
<body>
<header>
        <h1>Catálogo de Productos</h1>
    </header>
    <main>
        <div class="product-catalog">
            <?php
            include '../functions/conection.php';

            $stmt = $pdo->prepare("SELECT * FROM productos");
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($productos as $producto) {
                echo '<div class="product">';
                echo '<img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '">';
                echo '<h2>' . $producto['nombre'] . '</h2>';
                echo '<p>' . $producto['descripcion'] . '</p>';
                echo '<p class="price">$' . number_format($producto['precio'], 2) . '</p>';
                echo '<button>Comprar</button>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

<a href="logout.php">Cerrar Sesión</a>
</body>
</html>