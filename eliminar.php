<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM integrantes WHERE id_integrante = $id";
$conexion->query($sql);

header("Location: index.php");
?>