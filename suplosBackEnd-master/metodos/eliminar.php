
<?php
 include "../config/conexion.php";  /*La sentencia include incluye y evalúa el archivo especificado en este caso el acceso a la conexion con nuetra base de datos.
*/
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$query="DELETE FROM datos WHERE ID='.$id'";
	$result= mysqli_query($mysqli, $query);
	if(!$result){
		echo "Eliminado Correctamente";

	}
	$_SESSION['message']='Task Removed Succefull';
	$_SESSION['message_Type']='danger';
	header("Location:index.php");
}
?>
