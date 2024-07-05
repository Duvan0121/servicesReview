<?php
include '../functions/conection.php';

// Nombre de la tabla deseada (puedes pasarlo como parámetro GET o POST)
$tabla = isset($_GET['tabla']) ? $_GET['tabla'] : '';

if($tabla == "productos"){
    $tabla = "productos";
}else if($tabla == "clientes"){
    $tabla = "users";
}else if($tabla == "admin"){
    $tabla = "sellers";
}else{
    echo"La tabla ". $tabla." no se encuentra en la base de datos";
}

// Consulta SQL para seleccionar todos los registros de la tabla especificada
$sql = "SELECT * FROM $tabla";
echo $sql;
$registros = ejecutarConsulta($sql)->fetchAll();
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
                                <button type="submit" name="accion" value="editar">Editar</button>
                                <button type="submit" name="accion" value="eliminar"
                                    onclick="return confirm('¿Seguro que deseas eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>