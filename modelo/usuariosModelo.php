<?php

class UserModel {

    //declaramos la variable pdo para permitir la conexion y manipulacion de la bbdd en esta clase (encapsulacion)
    private $pdo;

    //constructor de la clase UserModel, lo utilizamos para inicializar el objeto pdo
    public function __construct($pdo) {
        
        //inicializamos el objeto pdo
        $this->pdo = $pdo;
    }

    public function registerUser($nombre, $apellidos, $direccion, $correo, $telefono, $postal, $password) {
        try {
            //Hasheamos la contraseña antes de almacenarla en la base de datos
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Limpia las cadenas antes de insertar en la base de datos
            $nombre = $this->limpiaString($nombre);
            $apellidos = $this->limpiaString($apellidos);
            $direccion = $this->limpiaString($direccion);
            $correo = $this->limpiaString($correo);
            $telefono = $this->limpiaString($telefono);
            $postal = $this->limpiaString($postal);

             //Escapa los caracteres especiales para evitar inyecciones SQL
             $nombre = htmlentities(addslashes($nombre));
             $apellidos = htmlentities(addslashes($apellidos));
             $direccion = htmlentities(addslashes($direccion));
             $correo = htmlentities(addslashes($correo));
             $telefono = htmlentities(addslashes($telefono));
             $postal = htmlentities(addslashes($postal));

            // Insertamos datos en la base de datos
            $query = "INSERT INTO usuarios (nombre, apellidos, direccion, email, telefono, codigo_postal, password) 
                      VALUES (:nombre, :apellidos, :direccion, :email, :telefono, :codigo_postal, :password)";
            $stmt = $this->pdo->prepare($query);

            //quitarlo del array asociativo y hacerlo normal
            if($stmt->execute([
                ':nombre' => $nombre,
                ':apellidos' => $apellidos,
                ':direccion' => $direccion,
                ':email' => $correo,
                ':telefono' => $telefono,
                ':codigo_postal' => $postal,
                ':password' => $hashed_password
            ])){
                return true;
            }else{
                $errorCode = $stmt->error;
                $errorMessage = $stmt->error;

                switch($errorCode){
                    default:
                    return "error al ejecutar la consulta: $errorMessage (código: $errorCode)";
                }
            }
 
           
        } catch (PDOException $e) {
            // Lanzamos la excepción para manejarla en el controlador
            throw new Exception("Error al registrar el usuario: " . $e->getMessage()); 
        }
    }

    public function loginUser($correo, $password) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :correo");
            $stmt->execute(array(':correo' => $correo));
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false; // Las credenciales son incorrectas
            }
        } catch (PDOException $e) {
            // En caso de error en la consulta SQL, registra el error y devuelve un mensaje genérico al usuario
            error_log('Error en la consulta: ' . $e->getMessage());
            return false; // Se produjo un error durante el inicio de sesión
        }
    }
    
    public function limpiaString($cadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'], [' ', ''], $cadena);
        $string = trim($string);
        $string = stripslashes($string);
        $string = str_ireplace("<script>", "", $string);
        $string = str_ireplace("</script>", "", $string);
        $string = str_ireplace("<script src>", "", $string);
        $string = str_ireplace("<script type =>", "", $string);
        $string = str_ireplace("SELECT * FROM", "", $string);
        $string = str_ireplace("DELETE FROM", "", $string);
        $string = str_ireplace("INSERT INTO", "", $string);
        $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
        $string = str_ireplace("DROP TABLE", "", $string);
        $string = str_ireplace("OR '1'='1", "", $string);
        $string = str_ireplace('OR "1"="1"', "", $string);
        $string = str_ireplace('OR ´1´=´1´', "", $string);
        $string = str_ireplace('is NULL; --', "", $string);
        $string = str_ireplace('LIKE "', "", $string);
        $string = str_ireplace("LIKE '", "", $string);
        $string = str_ireplace("LIKE ´", "", $string);
        $string = str_ireplace("OR 'a'='a", "", $string);
        $string = str_ireplace('OR "a"="a"', "", $string);
        $string = str_ireplace("OR ´a´=´a", "", $string);
        $string = str_ireplace("OR ´a´=´a´", "", $string);
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("^", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);
        $string = str_ireplace("==", "", $string);
        return $string;
    }
}

