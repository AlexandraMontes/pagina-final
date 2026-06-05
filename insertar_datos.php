<?php
$username = "root";
        $password = "";
        $server = "localhost";
        $database = "spiderman";

        $conexion = new mysqli($server, $username, $password, $database);

        if($conexion->connect_error){
        die("Conexion fallida:". $conexion->connect_error);
        }


        $nombre = htmlspecialchars($_POST['nombre']);
        $alias = htmlspecialchars($_POST['alias']);
        $fechacreacion = htmlspecialchars($_POST['fechacreacion']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $comics = htmlspecialchars($_POST['comics']);
        $superpoderes = htmlspecialchars($_POST['superpoderes']);


        $sql_personaje = "INSERT INTO personajes (nombre, alias, fechacreacion, descripcion) VALUES (?,?,?,?)";
        $stmt = $conexion->prepare($sql_personaje);
        $stmt->bind_param("ssss", $nombre, $alias, $fecha, $fechacreacion, $descripcion);
        $stmt->execute();
        $personaje_id = $stmt->insert_id;
        $stmt->close();

        foreach ($comics as $comic_titulo) {
        $comic_titulo = trim($comic_titulo);

        $sql_comic = "SELECT ComicID FROM Comics WHERE Titulo = ?";
        $stmt = $conexion->prepare($sql_comic);
        $stmt->bind_param("s", $comic_titulo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
                $comic_id = $result->fetch_assoc()['ComicID'];
        }else{

            $sql_insert_comic = "INSERT INTO Comics (Titulo) VALUES (?)";
            $stmt_insert = $conexion->prepare($sql_insert_comic);
            $stmt_insert->bind_param("s", $comic_titulo);
            $stmt_insert->execute();
            $comic_id = $stmt_insert->insert_id;
            $stmt_insert->close();
        }

        $sql_personaje_comic = "INSERT INTO PersonajeComic (PersonajeID, ComicID) VALUES (?, ?)";
        $stmt_relacion = $conexion->prepare($sql_personaje_comic);
        $stmt_relacion->bind_param("ii", $personaje_id, $comic_id);
        $stmt_relacion->execute();
        $stmt_relacion->close();
}

foreach ($superpoderes as $superpoder_nombre) {
    $superpoder_nombre = trim($superpoder_nombre);

    $sql_superpoder = "SELECT SuperpoderID FROM Superpoderes WHERE Nombre = ?";
    $stmt = $conexion->prepare($sql_superpoder);
    $stmt->bind_param("s", $superpoder_nombre);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        $superpoder_id = $result->fetch_assoc()['SuperpoderID'];
    }else{

       $ $sql_insert_superpoder = "INSERT INTO Superpoderes (Nombre) VALUES (?)";
            $stmt_insert = $conexion->prepare($sql_insert_superpoder);
            $stmt_insert->bind_param("s", $superpoder_nombre);
            $stmt_insert->execute();
            $comic_id = $stmt_insert->insert_id;
            $stmt_insert->close();
    }

    $sql_personaje_superpoder = "INSERT INTO PersonajeSuperpoder (PersonajeID, SuperpoderID) VALUES (?, ?)";
    $stmt_relacion = $conexion->prepare($sql_personaje_superpoder);
    $stmt_relacion->bind_param("ii", $personaje_id, $superpoder_id);
    $stmt_relacion->execute();
    $stmt_relacion->close();
}

$conexion->close();

header("Location: relaciones.php");
exit();
?>
