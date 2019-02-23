<h1 class="page-header">Usuarios registrados</h1>
<ol class="breadcrumb">
  <li><a href="cuenta.php">Principal</a></li>
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary"href="Login/login/registrarse.php">Nuevo usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Usuario</th>
            <th>Password</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->clave; ?></td>
            <td>    <a href="?c=Usuario&a=Update&id=<?php echo $r->Id; ?>">Editar</a></td>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Usuario&a=Eliminar&id=<?php echo $r->Id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
