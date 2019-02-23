<?php
class Vehiculo
{
	private $pdo;
    
    public $IdVehiculoCliente;
    public $TipoV;
	public $Placas;
	public $Marca;
    public $Referencia;
	public $Color;
    public $Modelo;
	public $Descripcion;
    public $IdCliente;
   

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

			$stm = $this->pdo->prepare("SELECT * FROM vehiculos");
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
			          ->prepare("SELECT * FROM vehiculos WHERE IdVehiculoCliente = ?");
			          

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
			            ->prepare("DELETE FROM vehiculos WHERE IdVehiculoCliente = ?");			          

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
			$sql = "UPDATE vehiculos SET 
						TipoV  = ?,
                        Placas= ?,
	                     Marca= ?,
							Referencia= ?,
							Color= ?,
							Modelo= ?,
							Descripcion= ?,
							IdCliente = ?
						
				    WHERE IdVehiculoCliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					 $data ->TipoV,
					 $data ->Placas,
					 $data ->Marca,
					 $data ->Referencia,
					 $data ->Color,
					 $data ->Modelo,
					 $data ->Descripcion,
					 $data ->IdCliente,
                     $data ->IdVehiculoCliente   
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Vehiculo $data)
	{
		try 
		{
		$sql = "INSERT INTO vehiculos (TipoV, Placas, Marca, Referencia, Color, Modelo, Descripcion, IdCliente) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data ->TipoV,
					 $data ->Placas,
					 $data ->Marca,
					 $data ->Referencia,
					 $data ->Color,
					 $data ->Modelo,
					 $data ->Descripcion,
					 $data ->IdCliente
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}