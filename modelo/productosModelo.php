<?php

class productosModelo{

    //declaramos la variable pdo para permitir la conexion y manipulacion de la bbdd en esta clase (encapsulacion)
    private $pdo;

    //constructor de la clase UserModel, lo utilizamos para inicializar el objeto pdo
    function __construct($pdo){
        $this->pdo = $pdo;
    
    }
    /*
    public function crearProducto($nombre, $seccion, $artista, $precio, $sello, $formato, $estado, $cantidad, $imagen){
        try{

            //limapiamos las cadenas antes de insertar en la bbdd
            $nombre = $this->limpiaString($nombre);
            $seccion = $this->limpiaString($seccion);
            $artista = $this->limpiaString($artista);
            $precio = $this->limpiaString($precio);
            $sello = $this->limpiaString($sello);
            $formato = $this->limpiaString($formato);
            $estado = $this->limpiaString($estado);
            $cantidad = $this->limpiaString($cantidad);
            $imagen = $this->limpiaString($imagen);


            //escapamos los caracteres especiales para evitar inyecciones SQL
            $nombre = htmlentities(addslashes($nombre));
            $seccion = htmlentities(addslashes($seccion));
            $artista = htmlentities(addslashes($artista));
            $precio = htmlentities(addslashes($precio));
            $sello = htmlentities(addslashes($sello));
            $formato = htmlentities(addslashes($formato));
            $estado = htmlentities(addslashes($estado));
            $cantidad = htmlentities(addslashes($cantidad));
            $imagen = htmlentities(addslashes($imagen));

            
            $query = "INSERT INTO productos (nombre, seccion, artista, precio, sello, formato, estado, cantidad, imagen) 
                      VALUES (:nombre, :seccion, :artista, :precio, :sello, :formato, :estado, :cantidad, :imagen)";
            $stmt = $this->pdo->prepare($query);
            
            //quitarlo del array asociativo y hacerlo normal
            if($stmt->execute([
                ':nombre' => $nombre,
                ':seccion' => $seccion,
                ':artista' => $artista,
                ':precio' => $precio,
                ':sello' => $sello,
                ':formato' => $formato,
                ':estado' => $estado,
                ':cantidad' => $cantidad,
                ':imagen' => $imagen
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

            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    */
    //PREGUNTAR SI ESTA BIEN ESTA QUERY 
    public function obtenerProductos(){
        $query = "SELECT id_productos, imagen, nombre, artista, precio, seccion, sello, formato, estado, cantidad FROM productos LIMIT 50";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);   
    }
    
    public function buscarProductos($term) {
        try {
            // Preparar la consulta SQL para buscar productos que coincidan con el término
            $query = "SELECT imagen, nombre, artista, precio, seccion, sello, formato, estado, cantidad FROM productos WHERE nombre LIKE :term OR artista LIKE :term";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':term', '%' . $term . '%', PDO::PARAM_STR);
            $stmt->execute();
            
            // Devolver los productos encontrados como objetos
            return $stmt->fetchAll(PDO::FETCH_OBJ);   
        } catch(PDOException $e) {
            // Manejar cualquier error que ocurra durante la búsqueda
            throw new Exception("Error al buscar productos: " . $e->getMessage());
        }
    }
    
    

    public function obtenerProductoPorId($id_productos) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id_productos = ?");
        $stmt->execute([$id_productos]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarProducto($id_productos, $nombre, $artista, $precio, $seccion, $sello, $formato, $estado, $cantidad) {
        $stmt = $this->pdo->prepare("UPDATE productos SET nombre = ?, artista = ?, precio = ?, seccion = ?, sello = ?, formato = ?, estado = ?, cantidad = ? WHERE id_productos = ?");
        return $stmt->execute([$nombre, $artista, $precio, $seccion, $sello, $formato, $estado, $cantidad, $id_productos]);
       

    }
    

    public function eliminarProducto($id_productos) {
        try {
            // Eliminar primero los registros relacionados en la tabla `pedido_detalle`
            $queryDetalle = "DELETE FROM pedido_detalle WHERE id_productos = :id";
            $stmtDetalle = $this->pdo->prepare($queryDetalle);
            $stmtDetalle->bindParam(':id', $id_productos, PDO::PARAM_INT);
            $stmtDetalle->execute();
    
            // Luego eliminar el producto de la tabla `productos`
            $query = "DELETE FROM productos WHERE id_productos = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id_productos, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount() > 0; // Devuelve verdadero si se eliminó al menos una fila
        } catch(PDOException $e) {
            // Manejar cualquier error que ocurra durante la eliminación
            throw new Exception("Error al eliminar el producto: " . $e->getMessage());
        }
    }
    

   
    public function insertarProducto($nombre, $seccion, $artista, $precio, $sello, $formato, $estado, $cantidad, $imagen) {
        try {
            // Obtener la ubicación temporal y el nombre del archivo de imagen
            $imagenTemporal = $imagen['tmp_name'];
            $nombreImagen = $imagen['name'];
    
            // Definir la ubicación de destino para guardar la imagen
            $directorioDestino = "../uploads/productos/" . $nombreImagen;
    
            // Mover el archivo de imagen al directorio de destino
            if (move_uploaded_file($imagenTemporal, $directorioDestino)) {
                // La imagen se ha subido correctamente, ahora puedes insertar los datos del producto en la base de datos
    
                // Preparar la consulta SQL para insertar un nuevo producto
                $query = "INSERT INTO productos (nombre, seccion, artista, precio, sello, formato, estado, cantidad, imagen) 
                          VALUES (:nombre, :seccion, :artista, :precio, :sello, :formato, :estado, :cantidad, :imagen)";
                $stmt = $this->pdo->prepare($query);
                
                // Ejecutar la consulta con los valores proporcionados
                $stmt->execute([
                    ':nombre' => $nombre,
                    ':seccion' => $seccion,
                    ':artista' => $artista,
                    ':precio' => $precio,
                    ':sello' => $sello,
                    ':formato' => $formato,
                    ':estado' => $estado,
                    ':cantidad' => $cantidad,
                    ':imagen' => $nombreImagen // Guardar el nombre de la imagen en la base de datos
                ]);
                
                // Verificar si se insertó correctamente
                if ($stmt->rowCount() > 0) {
                    return true; // Se insertó correctamente
                } else {
                    return false; // No se pudo insertar
                }
            } else {
                // Si hubo un error al subir la imagen, devolver falso
                return false;
            }
        } catch (PDOException $e) {
            // Manejar cualquier error que ocurra durante la inserción del producto
            throw new Exception("Error al insertar el producto: " . $e->getMessage());
        }
    }
    
    public function getProductosByDecada($decadas) {
        // Crear una cadena de placeholders para la consulta SQL
        $placeholders = implode(',', array_fill(0, count($decadas), '?'));
    
        // Preparar la consulta SQL
        $query = "SELECT * FROM productos WHERE seccion IN ($placeholders)";
        $stmt = $this->pdo->prepare($query);
    
        // Ejecutar la consulta con las décadas
        $stmt->execute($decadas);
    
        // Obtener todos los productos filtrados
        $productosFiltrados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Devolver los productos filtrados
        return $productosFiltrados;
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

