<?php

include("configuracion.php");

try {
    // Crear la conexión utilizando las constantes
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . BBDD, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejar errores en la conexión
    die("Error en la conexión: " . $e->getMessage());
}
