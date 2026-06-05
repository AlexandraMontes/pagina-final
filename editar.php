<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM integrantes WHERE id_integrante = $id";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();

if ($_POST) {
    $nombre = $_POST['nombre'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha = $_POST['fecha'];

    $sql = "UPDATE integrantes SET 
            nombre='$nombre',
            nacionalidad='$nacionalidad',
            fecha_nacimiento='$fecha'
            WHERE id_integrante=$id";

    $conexion->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Editar integrante</h1>

<form method="POST">
    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br><br>
    <input type="text" name="nacionalidad" value="<?php echo $fila['nacionalidad']; ?>"><br><br>
    <input type="date" name="fecha" value="<?php echo $fila['fecha_nacimiento']; ?>"><br><br>
    <button type="submit">Actualizar</button>
</form>

</body>
</html>