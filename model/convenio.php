<?php
class Convenio
{
	private $pdo;
    
    public $IdConvenio;
    public $NombreConvenio;
    public $Valor;
    public $id;
   
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

			$stm = $this->pdo->prepare("SELECT * FROM convenios");
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
			          ->prepare("SELECT * FROM convenios WHERE IdConvenio = ?");
			          

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
			            ->prepare("DELETE FROM convenios WHERE IdConvenio = ?");			          

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
			$sql = "UPDATE convenios SET 
						NombreConvenio          = ?, 
						Valor        = ?,
                        IdCliente        = ?
				    WHERE IdConvenio = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->NombreConvenio, 
                        $data->Valor,
                        $data->IdCliente,
                        $data->IdConvenio
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Convenio $data)
	{
		try 
		{
		$sql = "INSERT INTO convenios (NombreConvenio, Valor, IdCliente) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->NombreConvenio, 
                        $data->Valor,
                        $data->IdCliente
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}