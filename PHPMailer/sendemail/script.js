
$(document).ready(function () {
    $('#contactoForm').submit(function (e) {
        e.preventDefault();

        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var mensaje = $('#mensaje').val();

        // Función de validación
        if (!validarCampos(nombre, correo, mensaje)) {
            return;
        }

        // Función de validación para los campos del formulario
        function validarCampos(nombre, correo, mensaje) {
            // Validar campos vacíos
            if (nombre === '' || correo === '' || mensaje === '') {
                alert('Por favor, completa todos los campos');
                return false;
            }

            // Validar correo electrónico
            if (!validarCorreo(correo)) {
                alert('Por favor, ingresa un correo electrónico válido');
                return false;
            }
            // Validar nombre y mensaje (permitir solo espacios cuando se ingrese texto)
            if (nombre.trim() === '' || mensaje.trim() === '') {
                alert('Los campos no pueden tener espacios antes de ingresar el texto');
                return false;
            }



            return true;
        }

        // Función para validar el formato de correo electrónico
        function validarCorreo(correo) {
            // Expresión regular para validar correo electrónico
            var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return expresion.test(correo);
        }

        // Resto del código de validación y envío del formulario
        // ...

        // Datos del formulario
        var datos = {
            nombre: nombre,
            correo: correo,
            mensaje: mensaje
        };

        // Enviar datos a través de AJAX
        $.ajax({
            type: 'POST',
            url: 'enviar_correo.php',
            data: datos,
            success: function (response) {
                alert(response);
                $('#contactoForm')[0].reset();
            },
            error: function () {
                alert('Hubo un error al enviar el correo');
            }
        });
    });
});
