<h1 class="page-header">
    <?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Cliente">Clientes</a></li>
  <li class="active"><?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-cliente" action="?c=Cliente&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" />
    
   <div class="form-group">
     <label>Tipo de Documento</label>
        <input name="TipoDocumento" type="text" class="form-control" placeholder="Identificación del cliente" value="<?php echo $alm->TipoDocumento; ?>" readonly="readonly"  />
   </div>
    <div class="form-group">
        <label>Numero de Documento</label>
        <input type="text" name="DocumentoCliente" value="<?php echo $alm->DocumentoCliente; ?>" class="form-control" placeholder="Identificación del cliente"  />
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="NombreCliente" value="<?php echo $alm->NombreCliente; ?>" class="form-control" placeholder="Ingrese nombre Cliente"  />
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="ApellidosCliente" value="<?php echo $alm->ApellidosCliente; ?>" class="form-control" placeholder="Ingrese apellidos cliente" />
    </div>
    <div class="form-group">
        <label>Teléfono de contacto</label>
        <input type="text" name="NumeroTelefonico" value="<?php echo $alm->NumeroTelefonico; ?>" class="form-control" placeholder="Ingrese numero de contacto del cliente" />
    </div>
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Email" value="<?php echo $alm->Email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    <hr />
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>

