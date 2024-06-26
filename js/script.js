// Función para mostrar una alerta y redirigir después de un tiempo
function showAlert(message, type, redirectURL) {
    var alertContainer = document.createElement('div');
    alertContainer.className = 'alert-container ' + type;
    alertContainer.innerHTML = `
        <span class="alert-message">${message}</span>
        <span class="close-alert" onclick="closeAlert(this)">&times;</span>
    `;
    document.body.appendChild(alertContainer);

    setTimeout(function() {
        alertContainer.style.opacity = '0';
        setTimeout(function() {
            alertContainer.remove();
            if (redirectURL) {
                window.location.href = redirectURL;
            }
        }, 600); // Tiempo para eliminar la alerta después de desaparecer (600ms)
    }, 5000); // Tiempo para mostrar la alerta (5000ms)
}

// Función para cerrar la alerta manualmente
function closeAlert(element) {
    var alertContainer = element.closest('.alert-container');
    alertContainer.style.opacity = '0';
    setTimeout(function() {
        alertContainer.remove();
    }, 600); // Tiempo para eliminar la alerta después de desaparecer (600ms)
}
