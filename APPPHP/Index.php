<?php
// Incluir la conexión
include("Conexion.php");

try {
    // Obtener los datos de la tabla Usuarios
    $sql = "SELECT * FROM Usuarios";
    $stmt = $conn->query($sql); // Usamos PDO para ejecutar la consulta
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados como un array asociativo
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
        }


        .button-container {
            display: flex;
            justify-content: center; /* Centra los botones horizontalmente */
            gap: 20px; /* Espacio entre botones */
            margin: 20px;
        }

        .button-container a {
            padding: 10px 20px;
            background-color: #4CAF50; /* Color de fondo */
            color: white; /* Color del texto */
            text-decoration: none; /* Elimina subrayado */
            border-radius: 5px; /* Bordes redondeados */
            border: 2px solid #4CAF50; /* Borde del botón */
            transition: background-color 0.3s, border-color 0.3s; /* Transiciones suaves */
        }

        .button-container a:hover {
            background-color: white; /* Cambio de color al pasar el mouse */
            color: #4CAF50; /* Cambio de color de texto al pasar el mouse */
            border-color: #4CAF50; /* Mantiene el borde */
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Lista de Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verificar si hay usuarios en la base de datos
            if (!empty($result)) {
                // Mostrar los datos de cada fila
                foreach ($result as $row) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['Identificacion']) . "</td>
                        <td>" . htmlspecialchars($row['Nombres']) . "</td>
                        <td>" . htmlspecialchars($row['Apellidos']) . "</td>
                        <td>" . htmlspecialchars($row['Correo']) . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay usuarios registrados</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="button-container">
        <a href="./newUser.php">Agregar nuevo Usuario</a>
        <a href="./deleteUsers.php">Eliminar Usuario</a>
        <a href="./updateUsers.php">Editar Usuario</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$conn = null;
?>
