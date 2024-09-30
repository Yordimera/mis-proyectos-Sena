<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Agregar Nuevo Usuario</h2>
        <form action="./saveUsers.php" method="POST">
            <label for="Identificacion">Identificación</label>
            <input type="text" id="Identificacion" name="Identificacion" required>

            <label for="Nombres">Nombres</label>
            <input type="text" id="Nombres" name="Nombres" required>

            <label for="Apellidos">Apellidos</label>
            <input type="text" id="Apellidos" name="Apellidos" required>

            <label for="Correo">Correo</label>
            <input type="text" id="Correo" name="Correo">

            <input type="submit" value="Guardar Usuario">
        </form>
    </div>
</body>
</html>
