<?php
session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
require_once 'model/convenio.php';

class ConvenioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Convenio();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/convenio/convenio.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Convenio();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/convenio/convenio-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Convenio();
        
		$alm->IdConvenio = $_REQUEST['IdConvenio'];
		$alm->NombreConvenio = $_REQUEST['NombreConvenio']; 
        $alm->Valor = $_REQUEST['Valor'];
        $alm->IdCliente = $_REQUEST['IdCliente'];
                        
        
        
        $alm->IdConvenio > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: convenios.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: convenios.php');
    }
}