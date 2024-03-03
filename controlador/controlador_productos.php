<?php
include("../modelo/conexion.php");
include("../modelo/productosModelo.php");

// Creamos una instancia del modelo de productos
$productosModelo = new productosModelo($pdo);

// Manejar la solicitud de búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['term'])) {
    // Obtener el término de búsqueda del cuerpo de la solicitud
    $term = $_POST['term'];

    // Obtener los productos que coinciden con el término de búsqueda desde el modelo
    $productos = $productosModelo->buscarProductos($term);

    // Devolver los productos encontrados como JSON
    echo json_encode($productos);
}
// Manejar la solicitud para obtener la lista de productos
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener la lista de productos desde el modelo
    $productos = $productosModelo->obtenerProductos();

    // Devolver la lista de productos como JSON
    echo json_encode($productos);
}

// Manejar la solicitud para actualizar un producto
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['seccion']) && isset($_POST['artista']) && isset($_POST['precio']) && isset($_POST['sello']) && isset($_POST['formato']) && isset($_POST['estado']) && isset($_POST['cantidad'])) {
    // Obtener los datos del formulario de actualización del producto
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $seccion = $_POST['seccion'];
    $artista = $_POST['artista'];
    $precio = $_POST['precio'];
    $sello = $_POST['sello'];
    $formato = $_POST['formato'];
    $estado = $_POST['estado'];
    $cantidad = $_POST['cantidad'];

    // Actualizar el producto en el modelo
    $productosModelo->actualizarProducto($id, $nombre, $artista, $precio, $seccion, $sello, $formato, $estado, $cantidad);

    // Devolver una respuesta exitosa
    echo json_encode(array('mensaje' => 'Producto actualizado correctamente'));
}

// Manejar la solicitud para insertar un nuevo producto
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && isset($_POST['seccion']) && isset($_POST['artista']) && isset($_POST['precio']) && isset($_POST['sello']) && isset($_POST['formato']) && isset($_POST['estado']) && isset($_POST['cantidad']) && isset($_FILES['imagen'])) {
    // Obtener los datos del formulario de inserción del producto, incluida la imagen
    $nombre = $_POST['nombre'];
    $seccion = $_POST['seccion'];
    $artista = $_POST['artista'];
    $precio = $_POST['precio'];
    $sello = $_POST['sello'];
    $formato = $_POST['formato'];
    $estado = $_POST['estado'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_FILES['imagen'];

    // Insertar el producto en el modelo, pasando la imagen como parámetro
    $resultado = $productosModelo->insertarProducto($nombre, $seccion, $artista, $precio, $sello, $formato, $estado, $cantidad, $imagen);

    if ($resultado === true) {
        // La inserción fue exitosa
        echo json_encode(array('mensaje' => 'Producto insertado correctamente'));
    } else {
        // La inserción falló
        echo json_encode(array('error' => 'Error al insertar el producto'));
    }
}

// Manejar la solicitud para eliminar un producto
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Obtener el ID del producto a eliminar
    $id = $_POST['id'];

    // Eliminar el producto del modelo
    $resultado = $productosModelo->eliminarProducto($id);

    // Verificar si la eliminación fue exitosa
    if ($resultado) {
        // La eliminación fue exitosa
        echo json_encode(array('mensaje' => 'Producto eliminado correctamente'));
    } else {
        // La eliminación falló
        echo json_encode(array('error' => 'Error al eliminar el producto'));
    }
}

// Manejar la solicitud para filtrar por década
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos JSON de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // Verifica si la década está establecida en los datos
    if (isset($data['decadas'])) {
        // Si es así, obtén la década de los datos
        $decada = $data['decadas'];

        // Filtrar los productos por la década seleccionada
        $productosFiltrados = $productosModelo->getProductosByDecada($decada);

        // Devolver los productos filtrados como JSON
        echo json_encode($productosFiltrados);
    }
}









