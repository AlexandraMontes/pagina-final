<?php include("conexion.php"); ?>

<?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO integrantes (nombre, nacionalidad, fecha_nacimiento)
            VALUES ('$nombre', '$nacionalidad', '$fecha')";
    
    $conexion->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Agregar integrante</h1>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre"><br><br>
    <input type="text" name="nacionalidad" placeholder="Nacionalidad"><br><br>
    <input type="date" name="fecha"><br><br>
    <button type="submit">Guardar</button>
</form>

</body>
</html>