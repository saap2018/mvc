<h1 class="page-header">
    <?php echo $alm->IdVehiculoCliente != null ? $alm->Marca : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Vehiculo">Nuevo vehiculo</a></li>
  <li class="active"><?php echo $alm->IdVehiculoCliente != null ? $alm->Marca : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Vehiculo" action="?c=Vehiculo&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdVehiculoCliente" value="<?php echo $alm->IdVehiculoCliente; ?>" />
    
    <div class="form-group">
        <label>Tipo de Vehiculo</label>
        <input name="TipoV" type="text" class="form-control" placeholder="Ingrese su correo electrónico" value="<?php echo $alm->TipoV; ?>" readonly="readonly"  />
    </div>
    
    <div class="form-group">
        <label>Placas del Vehiculo</label>
        <input type="text" name="Placas" value="<?php echo $alm->Placas; ?>" class="form-control" placeholder="Ingrese su correo electrónico"  />
    </div>
    
    <div class="form-group">
        <label>Marca</label>
        <input type="text" name="Marca" value="<?php echo $alm->Marca; ?>" class="form-control" placeholder="Ingrese su correo electrónico" />
    </div>
    
    <div class="form-group">
        <label>Referencia</label>
        <input type="text" name="Referencia" value="<?php echo $alm->Referencia; ?>" class="form-control" placeholder="Ingrese su correo electrónico" />
    </div>
    <div class="form-group">
        <label>Color</label>
        <input type="text" name="Color" value="<?php echo $alm->Color; ?>" class="form-control" placeholder="Ingrese su correo electrónico" />
    </div>
    <div class="form-group">
        <label>Modelo del vehiculo</label>
        <input type="text" name="Modelo" value="<?php echo $alm->Modelo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" />
    </div>
    <div class="form-group">
        <label>Descripcion del vehiculo</label>
        <input type="text" name="Descripcion" value="<?php echo $alm->Descripcion; ?>" class="form-control" placeholder="Ingrese su correo electrónico" />
    </div>
  <div class="form-group">
        <label>Documento del cliente</label>
        <input type="text" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" class="form-control" placeholder="Ingrese su correo electrónico" />
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-Vehiculo").submit(function(){
            return $(this).validate();
        });
    })
</script>

