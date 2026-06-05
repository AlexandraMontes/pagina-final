<?php
$username = "root";
$password = "";
$host = "localhost";
$dbname = "bts_arirang";

try{
//Creamos la conexion con el drive de MySQL
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username,$password);
//Configuramos para que lance excepciones en caso de error
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Definimos el modo de obtencion de datos por defecto como array asociativo
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) { 
    //Si hay error, lo mostramos y detenemos la ejecucion 
    die("Error de conexio: " . $e->getMessage());
}
?>                                                                                                                                                                                   es este mi codigo de conexion.php