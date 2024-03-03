'use strict'

document.addEventListener('DOMContentLoaded', () => {

    //accedemos a los datos del formulario, de los inputs y del checkbox
    const formulario = document.getElementById('formulario');
    //con querySelectorAll obetenemos un array de los inputs
    const inputs = document.querySelectorAll('#formulario input');
    const checkbox = document.getElementById('terminos');

    //creamos un objeto con las expresiones regulares
    const expresiones = {
        nombre: /^[a-zA-ZÀ-ÿ\s]{4,16}$/,
        apellidos: /^[a-zA-ZÀ-ÿ\s]{4,36}$/,
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d[\d\s\-]{6,13}$/,
        postal: /^\d{4,9}$/,
        direccion: /^[a-zA-ZÀ-ÿ\d\s]{1,100}$/,
        //password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/,
    }

    //creamos un objeto con los campos, los inicializamos a false porque al principio están vacios
    const campos = {
        nombre: false,
        apellidos: false,
        correo: false,
        password: false,
        telefono: false,
        postal: false,
        direccion: false
    }
    /*
    al pasarle el objeto de evento e como parametro, permitimos que la funcion acceda a informacion relacionada con el evento, en este caso utilizamos
    e.target.name para saber que campo se esta validando
    */
    function validarFormulario(e) {

        //utilizamos un switch para determinar que campo está siendo validado
        //sabemos que campo se esta validando en cada momento gracias al atributo name
        switch (e.target.name) {
            case "nombre":
                //llamamos a la funcion validarCampo y dependiendo del campo que se este validando le pasamos la expresion regular correspondiente, el e.target y el nombre del campo
                validarCampo(expresiones.nombre, e.target, 'nombre');
                break;
            case "apellidos":
                validarCampo(expresiones.apellidos, e.target, 'apellidos');
                break;
            case "correo":
                validarCampo(expresiones.correo, e.target, 'correo');
                break;
            case "password":
                validarCampo(expresiones.password, e.target, 'password');
                //llamamos a la funcion validarPassword2 para comprobar que las contraseñas sean iguales
                validarPassword2();
                break;
            case "password2":
                validarPassword2();
                break;
            case "telefono":
                validarCampo(expresiones.telefono, e.target, 'telefono');
                break;
            case "postal":
                validarCampo(expresiones.postal, e.target, 'postal');
                break;
            case "direccion":
                validarCampo(expresiones.direccion, e.target, 'direccion');
                break;
        }
    }

    //validamos el campo
    //como parametros le pasamos la expresion correspondiente, el elemento del formulario (input) y el nombre del campo 
    function validarCampo(expresion, input, campo) {
        //quitamos todos los estilos cuando el input no tenga valor
        if (input.value.trim() === '') {
             //quitamos la clase formulario__grupo-incorrecto
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            
            //actualizamos el estado de los campos en el objeto campos si está vacio el input
            campos[campo] = false;
            return;
        }

        //si lo que escribe el usuario en el input coincide con la expresion
        if (expresion.test(input.value)) {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            
            //actualizamos el estado de los campos si está bien rellenado el input
            campos[campo] = true;

            //si lo que escribe el usuario en el input no coincide con la expresion
        } else {
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            
            //actualizamos el estado de los campos en el objeto campos si está mal el input
            campos[campo] = false;
        }
    }

    //validamos que las contraseñas sean iguales
    function validarPassword2() {

        //accedemos a los input de las contraseñas
        const inputPassword1 = document.getElementById('password');
        const inputPassword2 = document.getElementById('password2');

        //si la contrasena no coincide
        if (inputPassword1.value !== inputPassword2.value) {
            document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
            document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
            
            //actualizamos el estado del campo password en el objeto campos
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

    //en cada input tanto si levantamos la tecla como si quitamos el foco se ejecuta la funcion validarFormulario
    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    //creamos la variable formularioEnviado y la inicializamos a false
    let formularioEnviado = false;

    //añadimos el evento addEventListener al formulario
    formulario.addEventListener('submit', (e) => {

        //con preventDefault() evitamos el comportamiento por defecto del formulario
        e.preventDefault();

        //si el formulario ya ha sido enviado y el usuario quiere enviarlo otra vez le saldra el mensaje de error
        if (formularioEnviado) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El formulario ya ha sido enviado correctamente. Por favor, recargue la página para enviar uno nuevo.',
            });
        } else {

            //si todos los inputs estan completos
            if (campos.nombre && campos.apellidos && campos.correo && campos.password && campos.telefono && campos.postal && campos.direccion && checkbox.checked) {
                // Enviamos los datos al backend
                fetch('/tienda_discos/controlador/controlador_usuarios.php', {
                    method: 'POST',
                    body: new FormData(formulario)
                })
                //manejamos la promesa despues de que la solicitud haya sido enviada al servidor, se ejecuta cuando se recibe la respuesta del servidor
                .then(response => {
                    //si la respuesta del servidor es exitosa
                    if (response.ok) {
                        //console.log('solicitud enviada correctamente al servidor');
                        formularioEnviado = true;
                        // Redirigimos al usuario a la página de inicio de sesión (funciona, solo hay que quitar el comentario)
                        window.location.href = '/tienda_discos/vista/sinUsuario/login.php';
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
                //creamos un array vacio para meter en él los inputs que falten por rellenar
                const camposFaltantes = [];
                if (!campos.nombre) camposFaltantes.push("Nombre");
                if (!campos.apellidos) camposFaltantes.push("Apellidos");
                if (!campos.telefono) camposFaltantes.push("Telefono");
                if (!campos.correo) camposFaltantes.push("Correo Electrónico");
                if (!campos.password) camposFaltantes.push("Contraseña");
                if (!campos.postal) camposFaltantes.push("Código postal");
                if (!campos.direccion) camposFaltantes.push("direccion");
                if (!checkbox.checked) camposFaltantes.push("Acepta los Terminos y Condiciones");

                //creamos el mensaje de error
                const mensajeError = `Por favor, rellena los siguientes campos: ${camposFaltantes.join(', ')}.`;

                //sacamos el mensaje de erro con un swal
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: mensajeError,
                });
            }
        }
    });
});
