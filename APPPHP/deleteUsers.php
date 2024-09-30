<?php
// Incluir la conexión a la base de datos
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Identificacion'])) {
    $Identificacion = $_POST['Identificacion'];

    // Confirmación de eliminación
    if (isset($_POST['confirm']) && $_POST['confirm'] == "yes") {
        // Preparar la consulta para eliminar
        $sql = "DELETE FROM Usuarios WHERE Identificacion = :Identificacion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Identificacion', $Identificacion);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario eliminado exitosamente.";
        } else {
            echo "Error al eliminar el usuario.";
        }
    } else {
        echo "Operación cancelada.";
    }

    // Cerrar conexión
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
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
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #d32f2f;
        }
    </style>
    <script>
        function confirmarEliminacion() {
            var confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
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
    <h2>Eliminar Usuario</h2>
    <form method="POST" onsubmit="return confirmarEliminacion();">
        <label for="Identificacion">Identificación del Usuario:</label><br>
        <input type="text" id="Identificacion" name="Identificacion" required><br>
        <input type="hidden" id="confirm" name="confirm" value="">
        <input type="submit" value="Eliminar Usuario">
    </form>
</div>

</body>
</html>
