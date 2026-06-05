<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cine - Alexandra Montes Salazar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/rumangsa" rel="stylesheet">
                
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

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Inicio</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unidad 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color: #1a0000;">
                        <li><a href="mostrar.php" style="color: #ff4d4d;">Mostrar Datos</a></li>
                        <li><a href="meterdatos01.php" style="color: #ff4d4d;">Meter Datos</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<h1>Cine</h1>
<h2>Listado de Películas y Elenco</h2>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Año</th>
                <th>Director</th>
                <th>Actores</th>
                <th>Personajes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $username = "root";
            $password = "";
            $server = "localhost";
            $database = "cine";

            $conexion = new mysqli($server, $username, $password, $database);

            if ($conexion->connect_error) {
                echo "<tr><td colspan='6'>Error de conexión: " . $conexion->connect_error . "</td></tr>";
            } else {
                $sql = "SELECT 
                            p.PeliculaID,
                            p.Titulo,
                            p.AnioLanzamiento,
                            d.Nombre AS director,
                            GROUP_CONCAT(DISTINCT a.Nombre SEPARATOR ', ') AS actores,
                            GROUP_CONCAT(DISTINCT pa.Personaje SEPARATOR ', ') AS personajes
                        FROM peliculas p
                        LEFT JOIN directores d ON p.DirectorID = d.DirectorID
                        LEFT JOIN peliculaactor pa ON pa.PeliculaID = p.PeliculaID
                        LEFT JOIN actores a ON pa.ActorID = a.ActorID
                        GROUP BY p.PeliculaID";

                $resultado = $conexion->query($sql);

                if ($resultado && $resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["PeliculaID"]."</td>";
                        echo "<td>".$row["Titulo"]."</td>";
                        echo "<td>".$row["AnioLanzamiento"]."</td>";
                        echo "<td>".($row["director"] ?? '')."</td>";
                        
                        // Aquí está la corrección: si es NULL, imprime un string vacío ''
                        echo "<td>".($row["actores"] ?? '')."</td>";
                        echo "<td>".($row["personajes"] ?? '')."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center;'>No se encontraron registros.</td></tr>";
                }
                $conexion->close();
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>