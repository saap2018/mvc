<?php require_once('Connections/prueba.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
/*
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT IdCliente FROM clientes ORDER BY IdCliente ASC") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
*/

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 =mysqli_query($link, "SELECT HoraEntrada, HoraSalida FROM tiempo") or die(mysqli_error($link));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT nombre_tipov FROM tipo_de_vehiculo") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset3 = mysqli_query($link, "SELECT tarifa FROM tarifas") or die(mysqli_error($link));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset4 = mysqli_query($link, "SELECT Placas FROM vehiculos") or die(mysqli_error($link));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset5 = mysqli_query($link, "SELECT CONCAT (empleados.Nombre, empleados.Apellidos) as Nombre FROM empleados") or die(mysqli_error($link));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
?>
<h1 class="page-header">
    <?php echo $alm->IdControlIngreso != null ? $alm->PlacasVehiculo : 'Ingreso al parqueadero'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Ingreso">Ingreso</a></li>
  <li class="active"> <?php echo $alm->IdControlIngreso != null ? $alm->PlacasVehiculo : 'Ingreso al parqueadero'; ?></li>
</ol>

<form id="frm-ingreso" action="?c=Ingreso&a=Guardar" method="post" enctype="multipart/form-data">
   <input type="hidden" name="IdControlIngreso" value="<?php echo $alm->IdControlIngreso; ?>" />
    
    <div class="form-group">Tiempo    
      <label for="select"></label>
      <select name="tiempo" id="select" class="form-control">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset1['HoraEntrada']?>"<?php if (!(strcmp($row_Recordset1['HoraEntrada'], $row_Recordset1['HoraEntrada']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset1['HoraEntrada']?></option>
        <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysqli_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
      </select>
    </div>
    
    <div class="form-group">
        <label>Clase de Vehiculo</label>
   
      <label for="select2"></label>
        <select name="tipovehiculo" id="select2" class="form-control">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['nombre_tipov']?>"><?php echo $row_Recordset2['nombre_tipov']?></option>
          <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysqli_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
?>
        </select>
    </div>
    <div class="form-group">
        <label>Tarifa</label> 
        <label for="select3"></label>
        <select name="TipoTarifa" id="select3" class="form-control">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset3['tarifa']?>"><?php echo $row_Recordset3['tarifa']?></option>
          <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysqli_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
        </select>
    </div>
     <div class="form-group">
        Placa    	
          <label for="select4"></label>
          <select name="PlacasVehiculo" id="select4" class="form-control">
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset4['Placas']?>"><?php echo $row_Recordset4['Placas']?></option>
            <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysqli_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
          </select>
    </div>
        <div class="form-group">
        Nombre del empleado    	
          <select name="NombreEmpleado" id="select5" class="form-control">
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset5['Nombre']?>"><?php echo $row_Recordset5['Nombre']?></option>
            <?php
} while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysqli_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
  }
?>
          </select>
        </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-ingreso").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset1);
?>
