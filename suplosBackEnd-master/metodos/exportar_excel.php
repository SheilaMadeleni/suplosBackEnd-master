<?php
/* 
 Exportacion de archivos excel mediante los filtros de ciudad y tipo.
*/
//La sentencia include incluye y evalúa el archivo especificado en este caso el acceso a la conexion con nuetra base de datos.
//La funcion exportProductDatabase() recibe como parámetro un arreglo con la información a exportar o incluir en el excel.
//El constructor foreach proporciona un modo sencillo de iterar sobre arrays. 
//array_push inserta uno o más elementos al final de un array
//la intruccion header crea archivos php para generar el excel.
//isPrintHeader para determinar si ya se estableció el nombre de las columnas y así ejecutar array_keys(), solo una vez.
//arrays_keys imprime o establece el nombre de las columnas.
//arrays_value imprimer los valores de las columnas.

include "../config/conexion.php";       
   
$array_new = [];         
$data = file_get_contents("../data-1.json");
$result = json_decode($data, true);
 
foreach ($result as $result) {
    if(!empty($_POST['ciudad']) AND !empty($_POST['tipo']))
    {
        if ($result['Ciudad']==$_POST['ciudad'] AND $result['Tipo']==$_POST['tipo']) 
                  {
                    array_push($array_new, $result);
                  }
              }
          }
$exportex=exportProductDatabase($array_new);
echo "result";


function exportProductDatabase($datosResult) 
    $timestamp = time();
    $filename = 'Export_' . $timestamp . '.xls';
            
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Reporte_BienesIntelcost.xls");
            
        $isPrintHeader = false;

        foreach ($datosResult as $row) {
        if (! $isPrintHeader ) 
            {
            echo implode("\t", array_keys($row)) . "\n"; 
            $isPrintHeader = true;
            }

             echo implode("\t", array_values($row)) . "\n"; 
            }
exit();
}
