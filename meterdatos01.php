<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Bts</title>
    <style>
        :root {
            --color-de-fondo: #BFDBF7;
            --color-de-letras: #053C5E;
            --color-de-barra: #A31621;
            --color-de-botones: #1F7A8C;
            --color-extra: #DB222A;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--color-de-letras); 
            color: #ffffff; 
            padding: 20px;
        }

        h1 { color: var(--color-extra); text-align: center; }

        form { width: 50%; margin: auto; background: rgba(0,0,0,0.5); padding: 20px; border-radius: 10px; }

        label { display: block; margin-bottom: 5px; color: #ffffff; }

        input[type="text"], input[type="date"], textarea {
            width: 100%; padding: 10px; margin-bottom: 15px;
            border: 1px solid yellow; border-radius: 5px;
            background-color: #1f1f1f; color: #ffffff;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: yellow; color: #000;
            padding: 10px 20px; border: none; border-radius: 5px;
            cursor: pointer; font-weight: bold; width: 100%;
        }

        body::before {
            content: ""; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1; background: url(BTS-2.jpg) center/cover no-repeat;
            opacity: 0.3;
        }

        table { border-collapse: collapse; width: 95%; background-color: #fff; margin: 20px auto; color: #333; border-radius: 8px; overflow: hidden; }
        th { background-color: #3498db; color: white; padding: 15px; text-align: left; }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .biografia { font-style: italic; color: #555; max-width: 200px; }
    </style>
</head>
<body>

    <h1>Registro de tabla</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Nombre Real:</label>
        <input type="text" name="nombrereal" required>

        <label>Alias (Personaje):</label>
        <input type="text" name="personaje" required>

        <label>Altura (cm):</label>
        <input type="text" name="altura" required>

        <label>Peso (kg):</label>
        <input type="text" name="peso" required>

        <label>Superpoderes:</label>
        <input type="text" name="poderes" required>

        <label>Debilidad:</label>
        <input type="text" name="debilidad" required>

        <label>Sexo:</label>
        <input type="text" name="sexo" required>

        <label>Fecha de Creacion:</label>
        <input type="date" name="creacion" required>

        <label>Biografia:</label>
        <textarea name="biografia" required></textarea>

        <input type="submit" value="Guardar en la Base de Datos">
    
    </form>

    <?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "alex";

    $conexion = new mysqli($server, $username, $password, $database);

    if($conexion->connect_error){
        die("<p>Conexión fallida: " . $conexion->connect_error . "</p>");
    }

    // Procesar el formulario si se envía
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST['nombrereal'];
        $personaje = $_POST['personaje'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $poderes = $_POST['poderes'];
        $sexo = $_POST['sexo'];
        $debilidad = $_POST['debilidad'];
        $creacion = $_POST['creacion'];
        $biografia = $_POST['biografia'];

        $sql = "INSERT INTO personajes (nombrereal, personaje, altura, peso, poderes, sexo, debilidad, creacion, biografia) 
                VALUES ('$nombre','$personaje','$altura','$peso','$poderes','$sexo','$debilidad','$creacion','$biografia')";

        if($conexion->query($sql) === TRUE){
            echo "<p style='text-align:center; color: #2ecc71;'>¡Nuevo personaje creado con éxito!</p>";
        } else {
            echo "<p style='text-align:center; color: #e74c3c;'>Error: " . $conexion->error . "</p>";
        }
    }

    // Mostrar la tabla siempre
    $sql_mostrar = "SELECT * FROM bts ";
    $resultado = $conexion->query($sql_mostrar);

    if($resultado->num_rows > 0){
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre Real</th>
                <th>Personaje</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Poderes</th>
                <th>Sexo</th>
                <th>Debilidad</th>
                <th>Creacion</th>
                <th>Biografia</th>
              </tr>";
        while($row = $resultado->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["nombre_real"] . "</td>";
            echo "<td>" . $row["Personaje"] . "</td>";
            echo "<td>" . $row["Altura"] . " cm</td>";
            echo "<td>" . $row["Peso"] . " kg</td>";
            echo "<td>" . $row["Poderes"] . "</td>";
            echo "<td>" . $row["Sexo"] . "</td>";
            echo "<td>" . $row["Debilidad"] . "</td>";
            echo "<td>" . $row["Creation"] . "</td>";
            echo "<td class='Biografia'>" . $row["Biografia"] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; 
    } else {
        echo "<p style='text-align:center;'>No hay registros aún.</p>";
    }

    $conexion->close();
    ?>
</body>
</html>
