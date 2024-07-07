<?php
if (!function_exists('viewAlert')) {
    function viewAlert($message)
    {
        echo '<script>alert("' . $message . '");</script>';
    }
}

if (!function_exists('reasignarNamesTables')) {
    function reasignarNamesTables($tabla)
    {
        if ($tabla == "productos") {
            $tabla = "motorcycles";
        } else if ($tabla == "clientes") {
            $tabla = "contacts";
        } else if ($tabla == "admin") {
            $tabla = "administrators";
        } else {
            echo "La tabla " . $tabla . " no se encuentra en la base de datos";
        }
        return $tabla;
    }
}

if (!function_exists('redirigirProductos')) {
    function redirigirProductos()
    {
        header("Location: ../includes/products.php");
    }
}

if (!function_exists('mostrarMensajeRegistroExitoso')) {
    function mostrarMensajeRegistroExitoso($h1, $message, $redirectURL, $textBtn)
    {
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mensaje Generico</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .container {
                    text-align: center;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                    width: 100%;
                }
                h1 {
                    color: #333;
                }
                p {
                    color: #666;
                    font-size: 1.1em;
                }
    
                button {
                    padding: 10px;
                    background-color:#333;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>' . $h1 . '</h1>
                <p>' . $message . '</p>
                <button type="submit" onclick="window.location.href = \'' . $redirectURL . '\';">' . $textBtn . '</button>
            </div>
        </body>
        </html>
        ';
    }
}

if (!function_exists('logicaTablas')) {
    function logicaTablas($registros, $tabla)
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registros de la Base de Datos</title>
            <link rel="stylesheet" href="../css/tables.css">
        </head>

        <body>
            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <?php
                            // Obtener los nombres de las columnas dinámicamente
                            $columnas = array_keys($registros[0]); // Suponiendo que al menos un registro existe
                    
                            // Imprimir encabezados de columna
                            foreach ($columnas as $columna):
                                ?>
                                <th><?= ucfirst($columna); ?></th>
                            <?php endforeach; ?>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro): ?>
                            <tr>
                                <?php foreach ($columnas as $columna): ?>
                                    <td><?= htmlspecialchars($registro[$columna]); ?></td>
                                <?php endforeach; ?>
                                <td>
                                    <form action="../functions/crudProducts.php" method="post">
                                        <input type="hidden" name="id" value="<?= $registro['id']; ?>">
                                        <input type="hidden" name="tabla" value="<?= $tabla ?>">
                                        <button type="submit" name="accion" value="editar">Editar</button>
                                        <button type="submit" name="accion" value="eliminar"
                                            onclick="return confirm('¿Seguro que deseas eliminar este registro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" onclick="window.location.href='../includes/principalAdmin.php';" id="volver-button">Volver</button>
            <br>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
            </footer>
        </body>

        </html>
        <?php
    }
}
?>