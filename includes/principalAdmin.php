<?php
require '../functions/functions.php';
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    mostrarMensajeRegistroExitoso("No iniciaste sesión o ha expirado", "Por favor realiza el login", "../includes/login.php", "Ir al login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Tabla</title>
    <link rel="stylesheet" href="../css/principalAdmin.css">
</head>

<body>
    <div class="container">
        <h1>Panel para la gestión de la información</h1>
        <form id="tablaForm" action="sellers.php" method="post">
            <label for="tabla">Tablas disponibles para gestionar:</label>
            <select name="tabla" id="tablaSelect">
                <option value="na">Seleccione una tabla...</option>
                <option value="productos">Motocicletas</option>
                <option value="clientes">Potenciales Clientes</option>
                <option value="admin">Administrar accesos</option>
            </select>
            <div class="tabla-descripcion" id="descripcionProductos">
                <p>Esta tabla permite administrar la información que se publica en la página web acerca de las Motos a
                    la venta.</p>
            </div>
            <div class="tabla-descripcion" id="descripcionClientes">
                <p>Esta tabla permite administrar la información de los potenciales clientes que se registraron en el
                    formulario de contacto</p>
            </div>
            <div class="tabla-descripcion" id="descripcionAdmin">
                <p>Esta tabla permite administrar las credenciales de los administradores de la pagina</p>
            </div>

            <button type="submit" name="accion" value="agregar">Agregar registro en esa tabla</button>
            <button type="submit" name="accion" value="consultar">Consultar registros</button>
            <button type="button" name="accion" onclick="window.location.href='logout.php';" id="volver-button">Cerrar
                sesión</button>
        </form>

    </div>

    <script>
        document.getElementById('tablaForm').addEventListener('submit', function (event) {
            var seleccion = document.getElementById('tablaSelect').value;
            // Si no se ha seleccionado una tabla, prevenir el envío del formulario
            if (seleccion === 'na') {
                event.preventDefault();
                alert('Por favor, seleccione una tabla.');
                return;
            }
            // Agregar el nombre de la tabla seleccionada como un parámetro GET a la URL
            var action = this.getAttribute('action');
            this.setAttribute('action', action + '?tabla=' + seleccion);
        });

        document.getElementById('tablaSelect').addEventListener('change', function () {
            var seleccion = this.value;
            // Ocultar todas las descripciones
            var descripciones = document.getElementsByClassName('tabla-descripcion');
            for (var i = 0; i < descripciones.length; i++) {
                descripciones[i].style.display = 'none';
            }
            // Mostrar la descripción correspondiente a la tabla seleccionada
            document.getElementById('descripcion' + seleccion.charAt(0).toUpperCase() + seleccion.slice(1)).style.display = 'block';
        });
    </script>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>

</html>