<?php
// Incluir la conexión a la base de datos
include 'Conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Identificacion'])) {
    $Identificacion = $_POST['Identificacion'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Correo = $_POST['Correo'];

    // Confirmación de edición
    if (isset($_POST['confirm']) && $_POST['confirm'] == "yes") {
        // Preparar la consulta para actualizar
        $sql = "UPDATE Usuarios SET Nombres = :Nombres, Apellidos = :Apellidos, Correo = :Correo WHERE Identificacion = :Identificacion";
        $stmt = $conn->prepare($sql);
        
        // Bindear los parámetros
        $stmt->bindParam(':Nombres', $Nombres);
        $stmt->bindParam(':Apellidos', $Apellidos);
        $stmt->bindParam(':Correo', $Correo);
        $stmt->bindParam(':Identificacion', $Identificacion);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario actualizado exitosamente.";
        } else {
            echo "Error al actualizar el usuario.";
        }
    } else {
        echo "Operación cancelada.";
    }

    // Cerrar la conexión
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 300px;
            margin: 100px auto;
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function confirmarEdicion() {
            var confirmacion = confirm("¿Estás seguro de que deseas actualizar los datos de este usuario?");
            if (confirmacion) {
                document.getElementById('confirm').value = "yes";
                return true;
            } else {
                document.getElementById('confirm').value = "no";
                return false;
            }
        }
    </script>
</head>
<body>

<div class="form-container">
    <h2>Editar Usuario</h2>
    <form method="POST" onsubmit="return confirmarEdicion();">
        <label for="Identificacion">Identificación:</label><br>
        <input type="text" id="Identificacion" name="Identificacion" required><br>

        <label for="Nombres">Nombres:</label><br>
        <input type="text" id="Nombres" name="Nombres" required><br>

        <label for="Apellidos">Apellidos:</label><br>
        <input type="text" id="Apellidos" name="Apellidos" required><br>

        <label for="Correo">Correo:</label><br>
        <input type="text" id="Correo" name="Correo" required><br>

        <input type="hidden" id="confirm" name="confirm" value="">
        <input type="submit" value="Actualizar Usuario">
    </form>
</div>

</body>
</html>
