<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>TWICE DB</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Integrantes de TWICE</h1>

<a href="agregar.php">Agregar integrante</a>

<table>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Nacionalidad</th>
    <th>Fecha</th>
    <th>Acciones</th>
</tr>

<?php
$sql = "SELECT * FROM integrantes";
$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_assoc()) {
?>
<tr>
    <td><?php echo $fila["id_integrante"]; ?></td>
    <td><?php echo $fila["nombre"]; ?></td>
    <td><?php echo $fila["nacionalidad"]; ?></td>
    <td><?php echo $fila["fecha_nacimiento"]; ?></td>
    <td>
        <a href="editar.php?id=<?php echo $fila["id_integrante"]; ?>">Editar</a>
        <a href="eliminar.php?id=<?php echo $fila["id_integrante"]; ?>">Eliminar</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>