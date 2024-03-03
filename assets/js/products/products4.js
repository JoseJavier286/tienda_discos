'use strict'

//--------------------------------------- SLIDER --------------------------//
//accedemos a los botones
const btnLeft = document.querySelector('.btn-left');
const btnRight = document.querySelector('.btn-right');
//accedemos al contenedor
const slider = document.querySelector('#slider');
//accedemos a las imagenes
const sliderSection = document.querySelectorAll('.slider-section');

btnLeft.addEventListener('click', e => moveToLeft());
btnRight.addEventListener('click', e => moveToRight());

setInterval(() => {
    moveToRight();
}, 5000);

//para ir sumando los valores
let operacion = 0;

let contador = 0;
//sliderSection es la cantidad de imagenes que hay 
let widthImg = 100 / sliderSection.length;

//cuando le damos al click derecho
function moveToRight(){
    if(contador >= sliderSection.length - 1){
        contador = 0;
        operacion = 0;
        slider.style.transform = `translate(-${operacion}%)`;
        slider.style.transition = "none";
        return;
    }
        contador ++;

        //si quisieramos poner 4 imagenes debemos poner 25
        operacion = operacion + widthImg;
        slider.style.transform = `translate(-${operacion}%)`;
        slider.style.transition = "all ease .6s"
    }


function moveToLeft(){
    contador --;
    if(contador < 0){
        contador = sliderSection.length - 1;
        operacion = widthImg * (sliderSection.length - 1);
        slider.style.transform = `translate(-${operacion}%)`;
        slider.style.transition = "none";
        return;

    }
    //si quisieramos poner 4 imagenes debemos poner 25
    operacion = operacion - widthImg;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "all ease .6s"
    }

//--------------------------------- TIENDA ---------------------------//

//esperamos a que el DOM esté completamente cargado 
document.addEventListener("DOMContentLoaded", function() {
    //una vez que el dom está cargado, realizamos una solicitud fetch al controlador
    fetch("/tienda_discos/controlador/controlador_productos.php")
    //obtenemos la respuesta y la convertimos en json (preguntar, porque en el controlador ya esta en json)
    .then(response => response.json())
    //accedemos a los datos obtenidos
    .then(data => {
        //obtenemos el contenedor de productos
        const contenedorProductos = document.getElementById("contenedor-productos");
        // Iteramos sobre los datos de productos y creamos una tarjeta para cada uno
        data.forEach(producto => {
            
            const tarjetaProducto = document.createElement("div");
            tarjetaProducto.classList.add("producto");
            tarjetaProducto.innerHTML = `
            <img src="/tienda_discos/uploads/productos/${producto.imagen}" alt="${producto.nombre}">
            <h3>${producto.nombre}</h3>
            <p>${producto.artista}</p>
            <p>${producto.precio}€</p>
            <input type="button" value="ver detalles" name="detalles" id="detalles"> 
            `;

            //agregamos el evento click al boton detalles
            const botonDetalles = tarjetaProducto.querySelector("input[name='detalles']");
            botonDetalles.addEventListener("click", function(){
                mostrarDetallesProducto(producto);
            })


            contenedorProductos.appendChild(tarjetaProducto);
        });
    })
    .catch(error => {
        console.error('Error al obtener los productos:', error);
    });
});

//funcion para mostrar los detalles de los productos

function mostrarDetallesProducto(producto) {
    // Obtener el texto actual del botón "Ver detalles"
    const textoBoton = document.getElementById('detalles').value;

    // Realizar diferentes acciones según el texto del botón
    switch (textoBoton) {
        case 'Consultar productos':
            console.log("estamos consultando productos");
            break;
        case 'Editar productos':
            console.log("estamos editando productos");
            mostrarFormularioEdicion(producto);
            break;
        case 'Borrar productos':
                borrarProducto(producto.id_productos);
            break;
            
        case 'Insertar productos':
            // Llamar a la función para crear el formulario de inserción
            crearFormularioInsercion();
            console.log("estamos insertando productos");
            break;
            
        default:
        
            // Limpiar el contenido dentro del main
            const main = document.querySelector('main');
            main.innerHTML = '';

            const tituloTienda = document.getElementById("titulo");
            tituloTienda.textContent = '';

            const container = document.getElementById("container");
            container.innerHTML = '';
            // Crear elementos HTML para mostrar los detalles del producto
            const detallesProducto = document.createElement('div');
            detallesProducto.classList.add('detalles-producto');

            // Crear contenedores para la imagen y los detalles del producto
            const contenedorImagen = document.createElement('div');
            contenedorImagen.classList.add('imagen-producto');
            const contenedorDetalles = document.createElement('div');
            contenedorDetalles.classList.add('detalles');

            // Agregar la imagen al contenedor de imagen
            const imagenProducto = document.createElement('img');
            imagenProducto.src = `/tienda_discos/uploads/productos/${producto.imagen}`;
            imagenProducto.alt = producto.nombre;
            contenedorImagen.appendChild(imagenProducto);

            // Agregar los detalles del producto al contenedor de detalles
            const detallesHTML = `
                <h2>${producto.nombre}</h2>
                <p>Artista: ${producto.artista}</p>
                <p>Precio: ${producto.precio}€</p>
                <p>Sección: ${producto.seccion}</p>
                <p>Sello: ${producto.sello}</p>
                <p>Formato: ${producto.formato}</p>
                <p>Estado: ${producto.estado}</p>
                <p>Cantidad: ${producto.cantidad}</p>
            `;
            contenedorDetalles.innerHTML = detallesHTML;

            // Crear un botón para volver a la página de productos
            const botonVolver = document.createElement('button');
            botonVolver.textContent = 'Volver a Productos';
            botonVolver.addEventListener('click', function() {
                window.location.href = 'products.php';
            });

            // Agregar la imagen, los detalles y el botón de volver al contenedor de detalles del producto
            contenedorDetalles.appendChild(botonVolver);
            detallesProducto.appendChild(contenedorImagen);
            detallesProducto.appendChild(contenedorDetalles);

            // Agregar el contenedor de detalles del producto al contenedor principal de productos
            const contenedorProductos = document.getElementById("contenedor-productos");
            contenedorProductos.innerHTML = '';
            contenedorProductos.appendChild(detallesProducto);
            break;
    }
}

// Función para mostrar los detalles del producto en un formulario de edición
function mostrarFormularioEdicion(producto) {
    // Limpiar el contenido dentro del contenedor principal de productos
    const contenedorProductos = document.getElementById("contenedor-productos");
    contenedorProductos.innerHTML = '';

    // Crear el formulario de edición de producto
    const formularioEdicion = document.createElement('form');
    formularioEdicion.classList.add('formulario-edicion');

    // Agregar campos al formulario de edición
    formularioEdicion.innerHTML = `
        <h2>Editar Producto</h2>
        <input type="hidden" id="id_productos" name="id_productos" value="${producto.id_productos}">
        <img src="/tienda_discos/uploads/productos/${producto.imagen}" alt="${producto.nombre}">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="${producto.nombre}" required><br>
        <label for="artista">Artista:</label>
        <input type="text" id="artista" name="artista" value="${producto.artista}" required><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="${producto.precio}" required><br>
        <label for="seccion">Sección:</label>
        <input type="text" id="seccion" name="seccion" value="${producto.seccion}" required><br>
        <label for="sello">Sello:</label>
        <input type="text" id="sello" name="sello" value="${producto.sello}" required><br>
        <label for="formato">Formato:</label>
        <input type="text" id="formato" name="formato" value="${producto.formato}" required><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="${producto.estado}" required><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="${producto.cantidad}" required><br>
        <button type="button" onclick="actualizarProducto(${producto.id_productos})">Guardar Cambios</button>
        `;

    // Agregar el formulario de edición al contenedor principal de productos
    contenedorProductos.appendChild(formularioEdicion);
}

// Función para actualizar un producto
function actualizarProducto(id_productos) {
    // Obtener los valores actualizados del formulario
   
    const nombre = document.getElementById('nombre').value;
    const artista = document.getElementById('artista').value;
    const precio = document.getElementById('precio').value;
    const seccion = document.getElementById('seccion').value;
    const sello = document.getElementById('sello').value;
    const formato = document.getElementById('formato').value;
    const estado = document.getElementById('estado').value;
    const cantidad = document.getElementById('cantidad').value;
    // Realizar una solicitud AJAX para actualizar el producto
    console.log(id_productos);
    console.log(nombre);
    console.log(artista);
    console.log(precio);
    console.log(seccion);
    console.log(sello);
    console.log(formato);
    console.log(estado);
    console.log(cantidad);
    fetch("/tienda_discos/controlador/controlador_productos.php", {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id_productos}&nombre=${nombre}&artista=${artista}&precio=${precio}&seccion=${seccion}&sello=${sello}&formato=${formato}&estado=${estado}&cantidad=${cantidad}`,
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        //redirigir a productos
        window.location.href = 'products.php';
    })
    .catch(error => {
        console.error('Error al actualizar el producto:', error);
    });
}


// Función para buscar productos
function buscarProductos() {
    // Obtener el término de búsqueda del campo de entrada
    const term = document.getElementById('searchInput').value.trim();

    // Realizar una solicitud AJAX al servidor para buscar productos
    fetch('/tienda_discos/controlador/controlador_productos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `term=${term}`,
    })
    .then(response => response.json())
    .then(data => {
        // Procesar los resultados de búsqueda y actualizar la lista de productos en la página
        actualizarListaProductos(data);
    })
    .catch(error => {
        console.error('Error al buscar productos:', error);
    });
}

// Función para actualizar la lista de productos en la página
function actualizarListaProductos(productos) {
    const contenedorProductos = document.getElementById('contenedor-productos');
    contenedorProductos.innerHTML = '';

    productos.forEach(producto => {
        const tarjetaProducto = document.createElement('div');
        tarjetaProducto.classList.add('producto');
        tarjetaProducto.innerHTML = `
            <img src="/tienda_discos/uploads/productos/${producto.imagen}" alt="${producto.nombre}">
            <h3>${producto.nombre}</h3>
            <p>${producto.artista}</p>
            <p>${producto.precio}€</p>
            <input type="button" value="ver detalles" name="detalles" id="detalles"> 
        `;

        // Agregar evento click al botón detalles
        const botonDetalles = tarjetaProducto.querySelector("input[name='detalles']");
        botonDetalles.addEventListener("click", function(){
            mostrarDetallesProducto(producto);
        });

        contenedorProductos.appendChild(tarjetaProducto);
    });
}

// Obtener una referencia al botón de restablecimiento
const resetButton = document.getElementById('resetButton');

// Agregar un evento de clic al botón de restablecimiento
resetButton.addEventListener('click', function() {
    // Restablecer el campo de búsqueda (si es necesario)
    document.getElementById('searchInput').value = '';

    // Llamar a la función para obtener todos los productos nuevamente
    obtenerTodosLosProductos();
});

// Función para obtener todos los productos y mostrarlos en la página
function obtenerTodosLosProductos() {
    fetch('/tienda_discos/controlador/controlador_productos.php')
        .then(response => response.json())
        .then(data => {
            // Actualizar la lista de productos en la página
            actualizarListaProductos(data);
        })
        .catch(error => {
            console.error('Error al obtener todos los productos:', error);
        });
}

// Función para actualizar los botones dinámicamente
function actualizarBotones() {
    // Obtener referencias a los botones por su ID
    const btnConsultar = document.getElementById('consultarBtn');
    const btnEditar = document.getElementById('editarBtn');
    const btnBorrar = document.getElementById('borrarBtn');
    const btnInsertar = document.getElementById('insertarBtn');

    // Cambiar dinámicamente el texto y la funcionalidad de cada botón
    btnConsultar.textContent = 'Consultar productos';
    btnConsultar.addEventListener('click', function() {
        cambiarTextoBotonDetalles('Consultar productos');
    });

    btnEditar.textContent = 'Editar productos';
    btnEditar.addEventListener('click', function() {
        cambiarTextoBotonDetalles('Editar productos');
    });

    btnBorrar.textContent = 'Borrar productos';
    btnBorrar.addEventListener('click', function() {
        cambiarTextoBotonDetalles('Borrar productos');
    });

    btnInsertar.textContent = 'Insertar productos';
    btnInsertar.addEventListener('click', function() {
        cambiarTextoBotonDetalles('Insertar productos');
    });
}

// Función para cambiar el texto del botón "Ver detalles" según el botón presionado
function cambiarTextoBotonDetalles(texto) {
    // Obtener todos los botones "Ver detalles"
    const botonesDetalles = document.querySelectorAll('input[name="detalles"]');
    
    // Iterar sobre cada botón y cambiar su texto
    botonesDetalles.forEach(boton => {
        boton.value = texto;
    });
}

// Llamar a la función para actualizar los botones cuando se carga la página
window.addEventListener('load', function() {
    actualizarBotones();
});

// Función para crear el formulario de inserción dinámicamente
function crearFormularioInsercion() {
    // Obtener el contenedor donde se agregará el formulario
    const contenedorProductos = document.getElementById("contenedor-productos");

    // Limpiar el contenido dentro del contenedor de productos
    contenedorProductos.innerHTML = '';

    // Crear el formulario de inserción
    const formularioInsercion = document.createElement('form');
    formularioInsercion.classList.add('formulario-insercion');
    formularioInsercion.innerHTML = `
        <h2>Insertar Nuevo Producto</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="artista">Artista:</label>
        <input type="text" id="artista" name="artista" required><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br>
        <label for="seccion">Sección:</label>
        <input type="text" id="seccion" name="seccion" required><br>
        <label for="sello">Sello:</label>
        <input type="text" id="sello" name="sello" required><br>
        <label for="formato">Formato:</label>
        <input type="text" id="formato" name="formato" required><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br>
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" required><br>
        <button type="button" id="insertarBtn">Insertar Producto</button>
    `;

    // Agregar el formulario de inserción al contenedor principal de productos
    contenedorProductos.appendChild(formularioInsercion);

     // Obtener una referencia al botón "Insertar productos"
     const btnInsertar = formularioInsercion.querySelector('#insertarBtn');

     // Agregar un event listener para el clic en el botón
     btnInsertar.addEventListener('click', function() {
         // Llamar a la función para insertar el producto
         insertarProducto();
     });
}

function insertarProducto() {
    // Obtener los valores del formulario justo antes de realizar la solicitud AJAX
    const nombre = document.getElementById('nombre').value;
    const artista = document.getElementById('artista').value;
    const precio = document.getElementById('precio').value;
    const seccion = document.getElementById('seccion').value;
    const sello = document.getElementById('sello').value;
    const formato = document.getElementById('formato').value;
    const estado = document.getElementById('estado').value;
    const cantidad = document.getElementById('cantidad').value;
    const imagen = document.getElementById('imagen').files[0]; // Obtener el archivo de imagen

    // Crear un objeto FormData para enviar datos del formulario, incluyendo la imagen
    const formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('artista', artista);
    formData.append('precio', precio);
    formData.append('seccion', seccion);
    formData.append('sello', sello);
    formData.append('formato', formato);
    formData.append('estado', estado);
    formData.append('cantidad', cantidad);
    formData.append('imagen', imagen); // Agregar la imagen al FormData

    // Realizar una solicitud AJAX para insertar el nuevo producto
    fetch('/tienda_discos/controlador/controlador_productos.php', {
        method: 'POST',
        body: formData, // Usar FormData en lugar de la cadena de consulta
    })
    .then(response => response.json())
    .then(data => {
        // Realizar acciones adicionales después de insertar el producto si es necesario
        console.log('Producto insertado con éxito:', data);
        // Por ejemplo, limpiar el formulario después de la inserción
        document.getElementById('nombre').value = '';
        document.getElementById('artista').value = '';
        document.getElementById('precio').value = '';
        document.getElementById('seccion').value = '';
        document.getElementById('sello').value = '';
        document.getElementById('formato').value = '';
        document.getElementById('estado').value = '';
        document.getElementById('cantidad').value = '';
        document.getElementById('imagen').value = ''; // Limpiar el campo de imagen
        // Actualizar la lista de productos mostrada en la página
        obtenerTodosLosProductos();

        // Cambiar el texto del botón "Insertar productos" de nuevo a su estado original
        document.getElementById('insertarBtn').textContent = 'Insertar Producto';
    })
    .catch(error => {
        console.error('Error al insertar el producto:', error);
    });
}


//funcion para borrar un producto
function borrarProducto(idProductoABorrar) {
    // Mostrar el SweetAlert de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, ¡borrarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Realizar una solicitud AJAX para borrar el producto
            fetch('/tienda_discos/controlador/controlador_productos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${idProductoABorrar}`,
            })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta del servidor aquí
                console.log('Producto borrado con éxito:', data);
                // Actualizar la lista de productos mostrada en la página si es necesario
                obtenerTodosLosProductos(); // Asumiendo que tienes una función para obtener y mostrar todos los productos nuevamente
            })
            .catch(error => {
                console.error('Error al borrar el producto:', error);
                // Mostrar un mensaje de error al usuario o tomar alguna otra acción
            });
        }
    });
}

// Obtener una referencia a todos los checkboxes de década
const checkboxesDecada = document.querySelectorAll('input[name="decada"]');

// Agregar un event listener a cada checkbox
checkboxesDecada.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Filtrar productos por década cuando se marque o desmarque un checkbox
        filtrarPorDecada(checkbox);
    });
});

// Función para filtrar productos por década
function filtrarPorDecada() {
    // Crear un array para almacenar los valores de los checkbox marcados
    const decadasSeleccionadas = [];
    
    // Iterar sobre todos los checkboxes de década
    checkboxesDecada.forEach(checkbox => {
        // Verificar si el checkbox está marcado
        if (checkbox.checked) {
            // Obtener el valor del checkbox marcado y agregarlo al array
            decadasSeleccionadas.push(checkbox.value);
        }
    });

    console.log('Decadas seleccionadas:', decadasSeleccionadas);

    // Verificar si hay alguna década seleccionada
    if (decadasSeleccionadas.length > 0) {
        // Realizar una solicitud AJAX al controlador PHP para filtrar productos por década
        fetch('/tienda_discos/controlador/controlador_productos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ decadas: decadasSeleccionadas }),
        })
        .then(response => {
            const json = response.json(); // Intenta analizar la respuesta en cualquier caso
            if (!response.ok) {
                throw new Error('Error en la solicitud AJAX: ' + response.status);
            }
            return json;
        })
        .then(data => {
            if (data && data.length > 0) {
                console.log('Productos filtrados por década:', data);
                // Actualizar la lista de productos mostrada en la página con los productos filtrados
                actualizarListaProductos(data);
            } else {
                console.warn('La respuesta del servidor está vacía o incompleta.');
            }
        })
        .catch(error => {
            console.error('Error en la solicitud AJAX:', error);
        });
        
    } else {
        // Si no se selecciona ninguna década, mostrar un mensaje de advertencia o tomar otra acción apropiada
        console.warn('No se seleccionó ninguna década para filtrar.');
    }
}


//PONER EN LA BBDD EL EMAIL COMO UNICO 
/*
ALTER TABLE nombre_de_la_tabla
ADD CONSTRAINT email_unico UNIQUE (email);

TAMBIEN PONER UN CAMPO MAS LLAMADO PRIMER_INICIO TIPO INT VALORES 1 PREDETERMINADO PERSONALIZADO A 0 Y YA
*/



