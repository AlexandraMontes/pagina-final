<?php
require_once 'conexion.php';
if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'] ?? "";
    $nombre_real = $_POST['nombre_real'] ?? "";
    $nacionalidad = $_POST['nacionalidad'] ?? "";
    $posicion = $_POST['posicion'] ?? "";
    $foto = $_POST['foto'] ?? "";

//procesar la imagen
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
    $img_tmp_name = $_FILES['imagen']['tmp_name'];
    $img_name = $_FILES['imagen']['name'];

    $img_content = file_get_contents($img_tmp_name); //este es el contenido binario de la imagen

    //con esto que sigue es para guardar las imagenes en una carpeta que se creara.
    $upload_dir = 'uploads/';
    if(!is_dir($upload_dir)){
        mkdir($upload_dir, 0777, true);
    }
    move_uploaded_file($img_tmp_name, $upload_dir . $img_name);
} else{
    die("Error al subir imagen.");
} try {
        $sql = "INSERT INTO personajes (nombre, nombre_real, nacionalidad, posicion, foto)
        VALUES (:nombre_personaje, :nombre, :nombre_real, :nacionalidad, :posicion, :foto)";
        $stmt = pdo->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':nombre_real', $nombre_real);
        $stmt->bindParam(':nacionalidad', $nacionalidad);
        $stmt->bindParam(':posicion', $posicion);
        $stmt->bindParam(':foto', $img_content, PDO::PARAM_LOB); //el PARAM_LOB es para uso de datos binarios "grandes"

        $stmt->execute();

        header("Location: cards.php?success=1");
        exit();
    } catch (PDOException $e) {
        die("Error en la base de datos: " . $e->getMessage());
    }
}
else {
    header("Location: form.php");
    exit();
}
?>
