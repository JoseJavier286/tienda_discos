<?php
include("../modelo/conexion.php");
include("../modelo/usuariosModelo.php");

// Función para manejar el registro
function handleRegister($pdo) {
    if (empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['direccion']) || empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['postal']) || empty($_POST['password']) || empty($_POST['password2'])) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $postal = filter_var($_POST['postal'], FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password !== $password2) {
        throw new Exception("Las contraseñas no coinciden.");
    }

    $userModel = new UserModel($pdo);
    $registroExitoso = $userModel->registerUser($nombre, $apellidos, $direccion, $correo, $telefono, $postal, $password);

    if ($registroExitoso) {
        echo json_encode(array("message" => "Registro exitoso"));
    } else {
        echo json_encode(array("error" => "Error en el registro"));
    }
}

// Función para manejar el inicio de sesión
// Función para manejar el inicio de sesión
function handleLogin($pdo) {
    if (empty($_POST['correo']) || empty($_POST['password'])) {
        throw new Exception("Correo y contraseña son obligatorios para iniciar sesión.");
    }

    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $userModel = new UserModel($pdo);
    $user = $userModel->loginUser($correo, $password);

    if ($user) {
        session_start();
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol']; // Almacena el rol del usuario en la sesión
        echo json_encode(array("message" => "Inicio de sesión exitoso"));
    } else {
        echo json_encode(array("error" => "Correo electrónico o contraseña incorrectos"));
    }
}


// Función para manejar el cierre de sesión
function handleLogout() {
    session_start();
    // Destruye todas las variables de sesión
    /*

    con session_unset se utiliza para eliminar todas las variables de sesion, sin embargo la sesion en sí permanece activa
    significa que los datos de sesion aun estan disponibles para su uso pero todas las variables dentro de la sesion se eliminan

    */
    session_unset();
    // Destruye la sesión
    /*

    con sesion_destroy se utiliza para destruir la sesion, destruyendo todas las variables de la sesion
    despues de llamar a session_destroy la sesion deja de existir y se creara una nueva sesion vacia cuando se vuelva a loguear el usuario

    */
    session_destroy();
    echo json_encode(array("message" => "Sesión cerrada correctamente"));
}

// Manejar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        switch ($_POST['action']) {
            case 'register':
                handleRegister($pdo);
                break;

            case 'login':
                handleLogin($pdo);
                break;

            case 'logout':
                handleLogout();
                break;

            default:
                throw new Exception("Acción no válida.");
        }
    } catch (Exception $e) {
        echo json_encode(array("error" => $e->getMessage()));
    }
}

