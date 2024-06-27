document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Mostrar' : 'Ocultar';
        
        // Mantener el foco en el campo de contraseña después de cambiar el tipo de entrada
        passwordInput.focus();
        
        // Restaurar estilos del campo de contraseña
        if (type === 'password') {
            passwordInput.style.border = '1px solid #dddddd';
            passwordInput.style.borderRadius = '5px';
            passwordInput.style.padding = '12px';
            passwordInput.style.fontSize = '16px';
            passwordInput.style.fontFamily = 'Arial, sans-serif';
            // Asegurar que cualquier otro estilo específico se mantenga aquí
        } else {
            // Aquí puedes ajustar los estilos cuando la contraseña se muestra, si es necesario
        }
    });
});
