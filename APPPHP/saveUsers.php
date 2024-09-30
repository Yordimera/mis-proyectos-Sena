<?php
// Incluir la conexión a la base de datos usando PDO
include("Conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados desde el formulario
    $identificacion = $_POST['Identificacion'];
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $correo = $_POST['Correo'];

    try {
        // Preparar la consulta SQL para insertar el nuevo usuario
        $sql = "INSERT INTO Usuarios (Identificacion, Nombres, Apellidos, Correo) 
                VALUES (:identificacion, :nombres, :apellidos, :correo)";
        $stmt = $conn->prepare($sql);

        // Bindear los parámetros
        $stmt->bindParam(':identificacion', $identificacion);
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':correo', $correo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario guardado exitosamente.";
        } else {
            echo "Error al guardar el usuario.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
} else {
    echo "Método no permitido.";
}
?>
