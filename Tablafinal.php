<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla final</title>
</head>
<body>
    <style>
        :root{
            --color-de-fondo: #BFDBF7;
            --color-de-letras: #053C5E;
            --color-de-barra: #A31621;
            --color-de-botones: #1F7A8C;
            --color-extra: #DB222A;
        }

        body{
            background-color: #69DDFF;
        }

        h1{
            font-family: 'NEON CLUB MUSIC', sans-serif;
            color: var(--color-extra);
            text-align: center;
        }

        table{
            
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid var(--color-extra);
        }

        th {
            background-color: var(--color-de-botones);
            color: #282a36;
        }

        tr:nth-child(even) {
            background-color: var(--color-de-letras);
        }

        tr:nth-child(odd) {
            background-color: #6272a4;
        }
    </style>

    <?php
    //Estas dos lineas son para mostrar errores (como mi ex)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "bts"; //<-en un futuro esta se cambia por otra base de datos
    $conexion = new mysqli($server, $username, $password, $database);
    if($conexion->connect_error){
        die("Conexion fallida: " . $conexion->connect_error);
    }
    if(isset($POST["id"])){
        $id = (int) $_POST['id'];
        //Consulta para extraer los datos del personaje de la tabla
        $extraerdato = $conexion->query("SELECT * FROM bts WHERE id = $id");

        if ($extraerdato && $extraerdato->num_rows > 0) {
        $fetch = $extraerdato->fetch_assoc();
            $ID = $fetch['ID'];
            $nombre_real = $fetch['nombre_real'];
            $Personaje = $fetch['Personaje'];
            $Altura = $fetch['Altura'];
            $Peso = $fetch['Peso'];
            $Poderes = $fetch['Poderes'];
            $Sexo = $fetch['Sexo'];
            $Debilidad = $fetch['Debilidad'];
            $Creacion = $fetch['Creacion'];
            $Biografia = $fetch['Biografia'];
        }
    }

    ?>

</body>
</html>