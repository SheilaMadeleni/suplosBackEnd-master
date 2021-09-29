<?php
include "../config/conexion.php";  /*La sentencia include incluye y evalúa el archivo especificado en este caso el acceso a la conexion con nuetra base de datos.
*/

$Id = $_POST['Id'];
$Direccion = $_POST['Direccion'];
$Ciudad = $_POST['Ciudad'];
$Telefono = $_POST['Telefono'];
$Codigo_Postal = $_POST['Codigo_Postal'];
$Tipo = $_POST['Tipo'];
$Precio = $_POST['Precio'];

$precio1 = str_replace(",", "", $Precio); /* Reemplaza todas las apariciones del string buscado con el string de reemplazo */
$precio1 = str_replace("$", "", $precio1);

$sql = "INSERT INTO `datos`(`user_id`, `id_bienes`, `Direccion`, `Ciudad`, `Telefono`, `Codigo_Postal`, `Tipo`, `Precio`) VALUES (1,$Id,'$Direccion','$Ciudad','$Telefono','$Codigo_Postal','$Tipo',$precio1)";

if ($mysqli->query($sql) === TRUE) {
  echo "Guardado";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

$newURL = 'http://localhost:8080/suplosBackEnd-master/index.php'; 
header('Location: '.$newURL); /* Redirección del navegador */