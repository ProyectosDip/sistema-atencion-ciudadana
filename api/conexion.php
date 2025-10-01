<?php
header("Content-Type: application/json; charset=UTF-8");

// --- DATOS DE TU BASE DE DATOS DE HOSTINGER ---
$servidor = "localhost";
$nombre_db = "u455301875_atencionc";
$usuario_db = "u455301875_adminatencion";
$password_db = "3He$M1UYW?";

// Cadena de conexión para MySQL con PDO
$conexion_str = "mysql:host=$servidor;dbname=$nombre_db;charset=utf8mb4";

try {
    $conexion = new PDO($conexion_str, $usuario_db, $password_db);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Falló la conexión: " . $e->getMessage()]);
    exit();
}
?>