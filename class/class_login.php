<?php
session_start();
require_once("conexion.php");
class blog
{
	public function nueva_sesion()
	{
		//recogemos las variables post del formulario
		$nombre = $_POST['nom'];
		$password = $_POST['pass'];
		//realizamos la consulta sql 
		//colocamos script_tags para eliminar las etiquetas html y php, por si vienen
	    $query = "SELECT 
		* 
		FROM
		usuarios
		WHERE username='".strip_tags($nombre)."' 
		AND
		password='".strip_tags($password)."';";
		//ejecutamos la consulta y guardamos el resultado en la variable resultado
		$resultado = mysqli_query($query,Conectar::con());
		//si el número de filas devuelto por la variable resultado es 1,
		//lo que significa que en la base de datos blog, en la tabla usuarios
		//existe una fila que coincide con los datos ingresados
		//nos envíe a logueado.php, que sería como el home de nuestra página,
		//en otro caso, nos deja en nueva_sesion, con una variable get llamada usuario
		//y con el valor no_existe
		if ($reg=mysql_num_rows($resultado) == 0)
		{
			header("Location:index.php?usuario=no_existe");
		}else{
			
		}
			if($reg=mysql_fetch_array($resultado))
				{
					$_SESSION['nick'] = $reg['username'];	
					header("Location: inicio.php");
				}
	}
}
?>
