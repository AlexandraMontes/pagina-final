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
  }
?>