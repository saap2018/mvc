<?php
class Ingreso
{
	private $pdo;
    
	public $IdControlIngreso;
	public $tiempo; 
	public $tipovehiculo;
    public $TipoTarifa; 
	public $PlacasVehiculo; 
    public $NombreEmpleado;
   
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM ingresos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM ingresos WHERE IdControlIngreso = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM ingresos WHERE IdControlIngreso = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE ingresos SET
			    tiempo= ?, 
				tipovehiculo= ?,
    			TipoTarifa= ?, 
				PlacasVehiculo= ?, 
    			NombreEmpleado = ? 
				WHERE IdControlIngreso = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					
					
	$data->tiempo, 
	$data->tipovehiculo,
    $data->TipoTarifa, 
	$data->PlacasVehiculo, 
    $data->NombreEmpleado,
	$data->IdControlIngreso   
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Ingreso $data)
	{
		try 
		{
		$sql = "INSERT INTO ingresos (tiempo, tipovehiculo, TipoTarifa, PlacasVehiculo, NombreEmpleado)
		        VALUES (?, ?, ?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                $data->tiempo, 
			   	$data->tipovehiculo,
   				$data->TipoTarifa, 
				$data->PlacasVehiculo, 
    			$data->NombreEmpleado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}