<?php
include 'conexion.php';
header('Content-Type: text/html; charset=utf-8');

// Pega el hash del paso anterior aquí, entre las comillas
$hash_seguro = '$2y$10$gIRnrMMXtaOSG4tTar9DF.v9Lh21jvxE4XqMzljElI8f0e2IBL5i2';

// Borramos cualquier usuario 'admin' viejo para evitar errores
$conexion->exec("DELETE FROM usuarios WHERE usuario = 'admin'");

// Preparamos la consulta para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (usuario, password, nombre_completo) VALUES ('admin', :password_hash, 'Administrador del Sistema')";

try {
    $stmt = $conexion->prepare($sql);
    $stmt->execute([':password_hash' => $hash_seguro]);
    echo "<h2 style='color: green;'>¡Éxito! Usuario administrador creado correctamente.</h2>";
    echo "<p>Por seguridad, ahora debes eliminar los archivos crear_admin.php e insert_admin.php.</p>";
} catch (PDOException $e) {
    echo "<h2 style='color: red;'>Error al crear el usuario:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
$conexion = null;
?>
