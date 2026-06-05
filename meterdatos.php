<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        :root{
            --color-de-fondo:#BFDBF7;
            --color-de-letras:#053C5E;
            --color-de-barra:#A31621;
            --color-de-botones:#1F7ABC;
            --color-extra:#DB222A;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--color-de-letras);
            color: #ffffff
}
h1 {
    color: var(--color-extra);
}
form {
width: 50%;
margin: auto;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #ffffff
}

input[type="text"],
input[type="date"],
textarea {
    width: 60%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid yellow;
    border-radius: 5px;
    background-color: #1f1f1f;
    color: #ffffff
}

input[type="submit"] {
    background-color: yellow;
    color: #000;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="hidden"] {
    display: none;
}

#mensaje {
    margin-top: 15px;
    padding: 10px;
    border-radius: 5px;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: url(BTS-2.jpg) center/cover no-repeat;
    opacity: 0.3;
}
    </style>
    <form action="<?php echo htmlspecialchars($SERVER["PHP_SELF"]); ?>
    method="post" id="formulario">
    <label for="nombre">Nombre del personaje:</label>
    <input type="text" name="nombre" required><br>
    <label for="personaje">Alias del personaje:</label>
    <input type="text" name="personaje" required><br>
    <label for="altura">Altura:</label>
    <input type="text" name="altura" required><br>
    <label for="sexo">Sexo:</label>
    <input type="text" name="sexo" required><br>
    <label for="fecha_creacion">Fecha de creación:</label>
    <input type="date" name="fecha_creacion" required><br>
    <label for="descripcion">Descripcion del personaje:</label>
    <textarea name="descrpicion" required></textarea><br>
    <input type="submit" value="Guardar Datos">
    <?php
       $username = "root";
       $password = "";
       $server = "localhost";
       $database ="";
       $conexion = new mysqli ($server, $username, $password, $database);
       
       if($conexion->connect_error){
        die("Conexion fallida:".$conexion->connect_error);
       }
        if($_SERVER["REQUEST_METHOD"]=="POST"){}

        $ID = $_POST['ID'];
       $nombre_real = $_POST['nombre_real'];
       $Personaje = $_POST['Personaje'];
       $Altura = $_POST['Altura'];
       $Peso = $_POST['Peso'];
       $Poderes = $_POST['Poderes'];
       $Sexo = $_POST['Sexo'];
       $Debilidad = $_POST['Debilidad'];
       $Creacion = $_POST['Creacion'];
       $Biografia = $_POST['Biografia'];
       
       $sql = "INSERT INTO bts (ID, nombre_real, Personaje, Altura, Peso, Poderes, Sexo, Debilidad, Creation, Biografia) VALUES ('ID', 'nombre_real', 'Personajes', 'Altura', 'Peso', 'Poderes', 'Sexo', 'Debilidad', 'Creacion', '');

       if($conexion->query($sql)==TRUE){
       echo "Nuevo personaje creado con exito.";
       }else{
        echo"Error al agregar al nuevo personaje.";
  }
?>
</body
</html>