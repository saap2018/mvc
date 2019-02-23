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

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT IdCliente FROM clientes ORDER BY IdCliente ASC") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<h1 class="page-header">
    <?php echo $alm->IdConvenio != null ? $alm->NombreConvenio : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Convenio">Convenio</a></li>
  <li class="active"><?php echo $alm->IdConvenio != null ? $alm->NombreConvenio : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Convenio&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdConvenio" value="<?php echo $alm->IdConvenio; ?>" />
    
    <div class="form-group">
        <label>Nombre de Convenio</label>
        <input type="text" name="NombreConvenio" value="<?php echo $alm->NombreConvenio ?>" class="form-control" placeholder="Nombre de Convenio" />
    </div>
    
    <div class="form-group">
        <label>Valor Total del convenio</label>
        <input type="text" name="Valor" value="<?php echo $alm->Valor ?>" class="form-control" placeholder="Numero de identificación" />
    </div>
    
    <div class="form-group">
        <label>Cargo</label>
        
      <label for="select2" ></label>
        <select name="IdCliente" class="form-control">
        <option value=" ">Escoja un ID de cliente </option>
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['IdCliente']?>"><?php echo $row_Recordset2['IdCliente']?></option>
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
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php

mysqli_free_result($Recordset2);
?>
