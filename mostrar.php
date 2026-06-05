<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Bts</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #7084ac; padding: 20px; display: flex; flex-direction: column; align-items: center; }
        .table-container { width: 90%; max-width: 1100px; overflow-x: auto; }
        table { border-collapse: collapse; width: 100%; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 6px; font-size: 13px; table-layout: fixed; }
        th { background-color: #0f4a72; color: white; padding: 10px; text-align: left; text-transform: uppercase; }
        td { padding: 8px 10px; border-bottom: 1px solid #eee; vertical-align: top; word-wrap: break-word; }
        .bio-cell { max-width: 250px; }
        .ver-mas { color: #094269; cursor: pointer; font-weight: bold; text-decoration: underline; font-size: 0.9em; }
        .img-personaje { width: 50px; height: 50px; object-fit: cover; border-radius: 4px; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

    <h1>Catálogo de Bts</h1>
    <div class="table-container">
        <?php
        $conexion = new mysqli("localhost", "root", "", "alex");
        if($conexion->connect_error) die("Conexión fallida: " . $conexion->connect_error);

        $sql = "SELECT * FROM `bts`";
        $resultado = $conexion->query($sql);

        if($resultado && $resultado->num_rows > 0){
            echo "<table><tr><th>ID</th><th>Nombre</th><th>Personaje</th><th>Alt</th><th>Peso</th><th>Poderes</th><th>Sexo</th><th>Debilidad</th><th>Biografía</th><th>Img</th></tr>";
            
            while($row = $resultado->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . ($row["id"] ?? '') . "</td>";
                echo "<td>" . ($row["nombre_real"] ?? '') . "</td>";
                echo "<td>" . ($row["personaje"] ?? '') . "</td>";
                echo "<td>" . ($row["Altura"] ?? '') . "cm</td>";
                echo "<td>" . ($row["Peso"] ?? '') . "kg</td>";
                echo "<td>" . ($row["Poderes"] ?? '') . "</td>";
                echo "<td>" . ($row["Sexo"] ?? '') . "</td>";
                echo "<td>" . ($row["Debilidad"] ?? '') . "</td>";
                
                // Lógica de Biografía con botón "más/menos"
                $bio = $row["Biografia"] ?? 'Sin biografia';
                echo "<td class='bio-cell'>";
                if (strlen($bio) > 80) {
                    $cortada = substr($bio, 0, 80);
                    echo "<span class='short-bio'>{$cortada}... <span class='ver-mas' onclick='toggleBio(this)'>más</span></span>";
                    echo "<span class='full-bio' style='display:none;'>{$bio} <span class='ver-mas' onclick='toggleBio(this)'>menos</span></span>";
                } else {
                    echo $bio;
                }
                echo "</td>";

                echo "<td><img class='img-personaje' src='" . $row["imagen"] . "'></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay personajes registrados.</p>";
        }
        $conexion->close();
        ?>
    </div>

    <script>
        function toggleBio(element) {
            let parent = element.parentElement;
            let short = parent.parentElement.querySelector('.short-bio');
            let full = parent.parentElement.querySelector('.full-bio');
            if (short.style.display === "none") {
                short.style.display = "inline";
                full.style.display = "none";
            } else {
                short.style.display = "none";
                full.style.display = "inline";
            }
        }
    </script>
</body>
</html>