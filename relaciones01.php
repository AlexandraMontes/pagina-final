<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alexandra Montes Salazar - Marvel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/controwell-script" rel="stylesheet">
    <style>
        :root {
            --color-de-fondo: #053C5E;
            --color-extra: #DB222A;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--color-de-fondo); 
            color: #ffffff; 
            padding: 20px;
            position: relative;
        }

        body::before {
            content: ""; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1; background: url(BTS-2.jpg) center/cover no-repeat;
            opacity: 0.3;
        }

        h1 { color: var(--color-extra); text-align: center; }
        .navbar { background-color: #4d427a; border: none; }
        .navbar-brand, .navbar-nav > li > a { color: black !important; font-family: 'Controwell Script', sans-serif; }

        table { border-collapse: collapse; width: 95%; background-color: #fff; margin: 20px auto; color: #333; border-radius: 8px; overflow: hidden; }
        th { background-color: #3498db; color: white; padding: 15px; text-align: left; }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header"><a class="navbar-brand" href="index.html">Inicio</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unidad 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="mostrar.php">Mostrar Datos</a></li>
            <li><a href="meterdatos01.php">Meter Datos</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<h1>Personajes de Marvel</h1>
<table> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Fecha de Creación</th>
            <th>Descripción</th>
            <th>Título de Cómic</th>
            <th>Superpoder</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conexion = new mysqli("localhost", "root", "", "spiderman");
        if($conexion->connect_error) die("Conexión fallida: " . $conexion->connect_error);

        $sql = "SELECT
                p.personajeID,
                p.nombre AS nombre_personaje,
                p.alias,
                p.fechacreacion,
                p.descripcion,
                c.titulo AS comic_titulo,
                s.nombre AS nombre_poder
                FROM personajes p
                LEFT JOIN personajecomic pc ON p.personajeID = pc.personajeID
                LEFT JOIN comics c ON pc.comicID = c.comicID
                LEFT JOIN personajesuperpoder ps ON p.personajeID = ps.personajeID
                LEFT JOIN superpoderes s ON ps.superpoderID = s.superpoderID";

        $result = $conexion->query($sql);
        if($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row["personajeID"] . "</td>";
                echo "<td>" . $row["nombre_personaje"] . "</td>";
                echo "<td>" . $row["alias"] . "</td>";
                echo "<td>" . $row["fechacreacion"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "<td>" . $row["comic_titulo"] . "</td>";
                echo "<td>" . $row["nombre_poder"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align:center;'>No se encontraron personajes.</td></tr>";
        }
        $conexion->close();   
        ?>
    </tbody>
</table>
</body>   
</html>