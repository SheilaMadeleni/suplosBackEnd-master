<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="http://localhost:8080/suplosBackEnd-master/metodos/buscar.php" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad" required>
              <option value="" selected>Elige una ciudad</option>
              <option value="New York" selected>New York</option>
              <option value="Orlando" selected>Orlando</option>
              <option value="Los Angeles" selected>Los Angeles</option>
              <option value="Houston" selected>Houston</option>
              <option value="Washington" selected>Washington</option>
              <option value="Miami" selected>Miami</option>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo" required>
              <option value="">Elige un tipo</option>
              <option value="Casa">Casa</option>
              <option value="Casa de Campo">Casa de Campo</option>
              <option value="Apartamento">Apartamento</option>

            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
        <li><a href="#tabs-3">Reportes</a></li>
      </ul>

<!--En esta pestaña se realizara un filtro de los campos de ciudad y tipo selecionados mediante el metodo GET--> 
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>
            <div class="divider"></div>   
            <?php
            include "./config/conexion.php";       
            
            $data = file_get_contents("data-1.json");   /*Transmite el fichero data-1.json completo a una cadena*/
            $result = json_decode($data, true);         /*Decodifica un string de JSON*/
 
            foreach ($result as $result) {
              if(!empty($_GET['ciudad']) AND !empty($_GET['tipo']))  /*Si la variable ciudad y tipo esta no vacia entonces mostrara la tabla de los campos seleccionados*/
              {
              if ($result['Ciudad']==$_GET['ciudad'] AND $result['Tipo']==$_GET['tipo']) 
              {
           echo '
                      <div class="row">
                    <div class="card-image col s6"><img src="img/home.jpg" alt=""width="10" height="250"></div>

                  <div class="col s6">
                    <div class="table__item">Direccion:'. $result["Direccion"].'</div>
                  <div class="table__item">Ciudad:'. $result["Ciudad"].'</div> 
                  <div class="table__item">Telefono:'. $result["Telefono"].'</div>
                  <div class="table__item">Codigo Postal:'.$result["Codigo_Postal"].'</div> 
                  <div class="table__item">Tipo: '.$result["Tipo"].'</div>
                  <div class="table__item">Precio:'.$result["Precio"].'</div>
                  </div>

                  <div class="from">
                    <form action="http://localhost:8080/suplosBackEnd-master/metodos/guardar.php" method="POST">
                      <input type="text" name="Id" value="'.$result["Id"].'" style="display:none">
                      <input type="text" name="Direccion" value="'.$result["Direccion"].'" style="display:none">
                      <input type="text" name="Ciudad" value="'.$result["Ciudad"].'" style="display:none">
                      <input type="text" name="Telefono" value="'.$result["Telefono"].'" style="display:none">
                      <input type="text" name="Codigo_Postal" value="'.$result["Codigo_Postal"].'" style="display:none">
                      <input type="text" name="Tipo" value="'.$result["Tipo"].'" style="display:none">
                      <input type="text" name="Precio" value="'.$result["Precio"].'" style="display:none">
                      <button>Guardar</button>     
                  </form>
                  </div>
                  </div>';
                }
                          }
                          else
                          {
                            echo '
                                    <div class="row">
                    <div class="card-image col s6"><img src="img/home.jpg" alt=""width="10" height="250"></div>

                  <div class="col s6">
                    <div class="table__item">Direccion:'. $result["Direccion"].'</div>
                  <div class="table__item">Ciudad:'. $result["Ciudad"].'</div> 
                  <div class="table__item">Telefono:'. $result["Telefono"].'</div>
                  <div class="table__item">Codigo Postal:'.$result["Codigo_Postal"].'</div> 
                  <div class="table__item">Tipo: '.$result["Tipo"].'</div>
                  <div class="table__item">Precio:'.$result["Precio"].'</div>
                  </div>

                  <div class="from">
                    <form action="http://localhost:8080/suplosBackEnd-master/metodos/guardar.php" method="POST">
                      <input type="text" name="Id" value="'.$result["Id"].'" style="display:none">
                      <input type="text" name="Direccion" value="'.$result["Direccion"].'" style="display:none">
                      <input type="text" name="Ciudad" value="'.$result["Ciudad"].'" style="display:none">
                      <input type="text" name="Telefono" value="'.$result["Telefono"].'" style="display:none">
                      <input type="text" name="Codigo_Postal" value="'.$result["Codigo_Postal"].'" style="display:none">
                      <input type="text" name="Tipo" value="'.$result["Tipo"].'" style="display:none">
                      <input type="text" name="Precio" value="'.$result["Precio"].'" style="display:none">
                      <button>Guardar</button>     
                  </form>
                  </div>
                  </div>';
                }
                          }
              ?>
          </div>
        </div>
      </div>
                    
<!--En esta pestaña se eliminara los datos que han sido guardados de bienes disponibles en mis bienes.-->
      <div id="tabs-2" > 
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <div class="divider"></div>
          <form action="http://localhost:8080/suplosBackEnd-master/metodos/eliminar.php" method="POST">
          <?php
          $query= "SELECT * FROM datos";
          $result = mysqli_query($mysqli, $query);   
            ?>

            <div class="container-table ">
  
          <?php $result = mysqli_query($mysqli, $query);   
          while ($row=mysqli_fetch_assoc($result)) { ?>
          <div class="row">
          <div class="card-image col s6"><img src="img/home.jpg" alt=""width="10" height="250"></div>

          <div class="col s6">
            <div class="table__item">Direccion:<?php echo $row["Direccion"];?></div>
            <div class="table__item">Ciudad:<?php echo $row["Ciudad"];?></div> 
            <div class="table__item">Telefono:<?php echo $row["Telefono"];?></div>
            <div class="table__item">Codigo Postal: <?php echo $row["Codigo_Postal"];?></div> 
            <div class="table__item">Tipo: <?php echo $row["Tipo"];?></div>
            <div class="table__item">Precio: $<?php echo $row["Precio"];?></div>
          </div>

          <div class="from">
            <form action="http://localhost:8080/suplosBackEnd-master/metodos/eliminar.php" method="POST">
            <button>ELIMINAR </Button>    
            </form>
          </div>
          </div>
          <?php } mysqli_free_result($result); ?> 
        </div>
          </div>
        </div>
      </div>

<!--En esta pestaña se exportara un archivo excel mediante filtros de ciudad y tipo, por el metodo post sin ningun uso de librerias-->

      <div id="tabs-3" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Exportar Reporte:</h5>
            <div class="divider"></div>
            <div >
            <form action="http://localhost:8080/suplosBackEnd-master/metodos/exportar_excel.php" method="post" id="formulario">
            <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad" required>
              <option value="" selected>Elige una ciudad</option>
              <option value="New York" selected>New York</option>
              <option value="Orlando" selected>Orlando</option>
              <option value="Los Angeles" selected>Los Angeles</option>
              <option value="Houston" selected>Houston</option>
              <option value="Washington" selected>Washington</option>
              <option value="Miami" selected>Miami</option>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo" required>
              <option value="">Elige un tipo</option>
              <option value="Casa">Casa</option>
              <option value="Casa de Campo">Casa de Campo</option>
              <option value="Apartamento">Apartamento</option>
            </select>
          </div>

          <div class="botonField">
            <input type="submit" class="btn white" value="GENERAR EXCEL" id="submitButton">
          </div>
         </div>
        </div>
      </form>
    </div>
        
    </div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
