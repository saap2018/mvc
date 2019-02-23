<?php
class Conectar
{
	public static function con()
	{
		$conexion = mysqli_connect("localhost","root","");
		mysqli_query(" ",$conexion);
		mysql_select_db("saap");
		return $conexion;
	}
}
?>
