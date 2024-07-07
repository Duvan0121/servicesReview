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
        <h1>Catálogo de Motocicletas</h1>
    </header>
    <main>
        <div class="product-catalog">
            <?php
            include '../functions/conection.php';

            $stmt = $pdo->prepare("SELECT * FROM motorcycles");
            $stmt->execute();
            $motorcycles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($motorcycles as $motorcycle) {
                echo '<div class="product">';
                echo '<h2>' . $motorcycle['nameMotorcycle'] . '</h2>';
                echo '<img src="' . $motorcycle['pathImage'] . '" alt="' . $motorcycle['nameMotorcycle'] . '">';
                echo '<p>' . $motorcycle['descriptionMotorcycle'] . '</p>';
                echo '<p class="price">Precio sujeto a modificaciones: $' . number_format($motorcycle['priceMotorcycle'], 2) . '</p>';
                echo '<button>Cotizar</button>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

    <button type="button" onclick="window.location.href='../index.php';" id="volver-button">Volver</button>
    <br>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>
</html>