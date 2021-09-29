 <?php
/* 
 Redireccion del navegador
*/
//header es usado para enviar encabezados HTTP sin formato.

$newURL = 'http://localhost:8080/suplosBackEnd-master/index.php?ciudad='.$_POST['ciudad'].'&tipo='.$_POST['tipo'];
header('Location: '.$newURL);