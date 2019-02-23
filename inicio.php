<center><h1 class="page-header">Aplicativo SAAP</h1></center>


<?php
require_once("class/class_login.php");
include 'view/header.php';

if(!isset($_SESSION["nick"]))
{
?>
Debe iniciar session para acceder a este contenido
<a href='index.php'>Página principal</a>";
<?php
}else{
?>
<h2><center>Bienvenido <?php echo $_SESSION['nick']?></h2><br />
<ul>
<li><a href="ingresos.php">Generar Ingreso</a></li>
<li><a href="registro clientes.php">Gestion de clientes</a></li>
<li><a href="registro usuarios.php">Gestion de usuarios</a></li>
<li><a href="vehiculos.php">Gestion de vehiculos</a></li>
<li><a href="empleados.php">Gestion de empleados</a></li>
<li><a href="convenios.php">Gestionar convenios</a></li>
<li><a href="disponibles.php">Disponibilidad de parqueaderos</a></li>
<li><a href="tiempos.php">Liquidar tiempo</a></li>
</ul>

<a href="cerrar_sesion.php">Cerrar sesión</a></center>
<?php
}
include 'view/footer.php';
?>