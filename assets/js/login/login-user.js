'use strict'

document.addEventListener('DOMContentLoaded', () => {
    //accedemos al formulario y a los input de este
    const formulario = document.getElementById('formulario');
    const inputs = document.querySelectorAll('#formulario input');

    //creamos un objeto con las expresiones
    const expresiones = {
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        password:  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,500}$/, //al menos una letra minúscula, una mayúscula, un número, un caracter especial y entre 8 y 15 caracteres
    }

    //creamos un objeto con los campos, los inicializamos a false porque al principio están vacios
    const campos = {
        correo: false,
        password: false
    }

    //validamos cada campo en funcion del nombre del campo, para eso utilizamos e.target.name
    const validarFormulario = (e) => {
        switch (e.target.name) {
            case "correo":
                validarCampo(expresiones.correo, e.target, 'correo');
                break;
            case "password":
                validarCampo(expresiones.password, e.target, 'password');
                break;
        }
    }

    //validamos el campo
    const validarCampo = (expresion, input, campo) => {
        if (input.value.trim() === '') {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = false;
        } else {
            if (expresion.test(input.value)) {
                document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
                document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
                document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
                document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
                document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
                campos[campo] = true;
            } else {
                document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
                document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
                document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
                document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
                document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
                campos[campo] = false;
            }
        }
    }

    const validarPassword2 = () => {
        const inputPassword1 = document.getElementById('password');
        const inputPassword2 = document.getElementById('password2');

        if (inputPassword1.value !== inputPassword2.value) {
            document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
            document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');

            campos['password'] = false;
        } else {
            document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
            document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
            document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');

            campos['password'] = true;
        }
    }

    //recorremos todos los input del formulario
    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    //inicializamos la variables formularioEnviado a false por si intenta enviar el formulario dos veces seguidas le salga el mensaje de error
    let formularioEnviado = false;

    formulario.addEventListener('submit', (e) => {
        e.preventDefault();

        //si el formulario ya ha sido enviado previamente, sacamos un sweet alert con el siguiente mensaje
        if (formularioEnviado) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El formulario ya ha sido enviado correctamente. Por favor, recargue la página para enviar uno nuevo.',
            });
            
        } else {
            //si el campo correo y el campo password son validos
            if (campos.correo && campos.password) {

                // Enviamos los datos al backend
                fetch('/tienda_discos/controlador/controlador_usuarios.php', {
                    method: 'POST',
                    body: new FormData(formulario)
                })
                //manejamos la promesa despues de que la solicitud haya sido enviada al servidor, se ejecuta cuando se recibe la respuesta del servidor
                .then(response => {
                    //si la respuesta del servidor es exitosa
                    if (response.ok) {
                        
                        formularioEnviado = true;
                        // Redirigimos al usuario a la página de inicio de sesión (funciona, solo hay que quitar el comentario)
                        window.location.href = '/tienda_discos/vista/sinUsuario/homePage.php';
                    } else {

                        //si la respuesta del servidor no es exitosa
                        console.error('Error al enviar la solicitud POST al backend');
                    }
                })

                //capturamos cualquier error que pueda ocurrir durante el envio de la solicitud
                .catch(error => {
                    console.error('Error al enviar la solicitud POST al backend:', error);
                });

            } else {
                const camposFaltantes = [];
                if (!campos.correo) camposFaltantes.push("Correo Electrónico");
                if (!campos.password) camposFaltantes.push("Contraseña");

                const mensajeError = `Por favor, rellena los siguientes campos: ${camposFaltantes.join(', ')}.`;

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: mensajeError,
                });
            }
        }
    });
});
