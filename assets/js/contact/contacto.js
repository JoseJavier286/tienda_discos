'use strict';

function mostrarMenu() {
    document.getElementById('menuDesplegable').style.display = 'block';
}

function ocultarMenu() {
    document.getElementById('menuDesplegable').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', () => {

    const formulario = document.getElementById('formulario');

    // Accedemos a los inputs que se encuentren dentro del formulario
    const inputs = document.querySelectorAll('#formulario input');
    const textarea = document.querySelectorAll('#formulario textarea');

    const expresiones = {
        nombre: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, // letras mayusculas y minusculas, numeros _ + y - antes del @
        textarea: /^[a-zA-ZÀ-ÿ0-9\s,.\?¿]{1,200}$/ //letas mayusculas, minusculas y numeros, espacios, comas, puntos, interrogaciones, maximo 200 caracteres
    }

    // Creamos un objeto con los campos
    // Los inicializamos a falso para comprobar que al principio están vacíos y luego han sido rellenados
    const campos = {
        nombre: false,
        correo: false,
        textarea: false
    }

    //validamos cada campo en funcion del nombre del campo, para eso utilizamos e.target.name
    const validarFormulario = (e) => {

        //utilizamos un switch para determinar que campo está siendo validado
        switch (e.target.name) {
            case "nombre":
                validarCampo(expresiones.nombre, e.target, 'nombre');
                break;

            case "correo":
                validarCampo(expresiones.correo, e.target, 'correo');
                break;

            case "textarea":
                validarCampo(expresiones.textarea, e.target, 'textarea');
                break;
        }
    }

    // Función que comprueba si el valor introducido por el usuario coincide con la expresión
    // En caso de que coincida, modificamos las clases para indicar que el campo es correcto
    const validarCampo = (expresion, input, campo) => {
        // Verificamos si el valor está vacío
        if (input.value.trim() === '') {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = false;
            return; // Salimos de la función si el valor está vacío
        }

        // Comprobamos que lo que se ha introducido en el usuario coincide con la expresión regular necesaria
        if (expresion.test(input.value)) {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = true;
            // Si la expresión regular no es correcta, ejecutamos este código
        } else {
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            campos[campo] = false;
        }
    }



    // Esta función se ejecuta por cada uno de los inputs que tengamos en nuestra página
    // Cuando levantemos la tecla se ejecutará la función validarFormulario
    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);


    });

    textarea.forEach((textarea)=>{
        textarea.addEventListener('keyup', validarFormulario);
        textarea.addEventListener('blur', validarFormulario);
    });



    let formularioEnviado = false;

    formulario.addEventListener('submit', (e) => {
        // Evitamos que el formulario se envíe de manera predeterminada
        e.preventDefault();

        const terminos = document.getElementById('terminos');

        // Verificamos si el formulario ha sido enviado anteriormente
        if (formularioEnviado) {
            // Si el formulario ha sido enviado, no permitimos enviarlo nuevamente
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El formulario ya ha sido enviado correctamente. Por favor, recargue la página para enviar uno nuevo.',
            });
        } else {
            // Verificamos que todos los campos estén completos y que los términos y condiciones estén aceptados
            if (campos.nombre && campos.correo && campos.textarea && terminos.checked) {
                // Si todos los campos están rellenados y el checkbox marcado, reseteamos el formulario
                formulario.reset();
                formularioEnviado = true; 

                // Añadimos el mensaje de enviado correctamente usando SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Formulario enviado exitosamente!',
                    showConfirmButton: false,
                    timer: 2000
                });

                // Quitamos los iconos de color verde que marcan que están bien los inputs
                document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                    icono.classList.remove('formulario__grupo-correcto');
                });
            } else {
                // Creamos un array para almacenar los campos que faltan por rellenar
                const camposFaltantes = [];

                // Verificamos cada campo y agregamos al array si está vacío
                if (!campos.nombre) camposFaltantes.push("Nombre");
                if (!campos.correo) camposFaltantes.push("Correo Electrónico");
                if (!campos.textarea) camposFaltantes.push("Mensaje");

                // Verificamos si los términos y condiciones no están aceptados
                if (!terminos.checked) camposFaltantes.push("Términos y Condiciones");

                // Construimos el mensaje de error con los campos faltantes
                const mensajeError = `Por favor, rellena los siguientes campos: ${camposFaltantes.join(', ')}.`;

                // Mostramos el mensaje de error usando SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: mensajeError,
                });
            }
        }
    });
});

