<?php

require_once("./model/Medico.php");

class MedicosController{
    
    private $model;
    
    public function __construct()
    {
        $this->model = new Medico();
    }

    public function index()
    {
        require_once("view/medicos/index.php");
    }

    public function edit()
    {
        $data = new Medico();
        
        $model = $this->model->find($_GET['id']);
        if(!$model){
            die("O médico buscado não se encontra em nossa base de dados!");
        }
        
        require_once("view/medicos/edit.php");
    }

    public function createOrUpdate()
    {
        $object = new Medico();
        
        $object->id                      = $_POST['id'];
        $object->nome                    = $_POST['nome'];
        $object->email                   = $_POST['email'];
        $object->senha                   = $_POST['senha'];
        $object->endereco_consultorio    = $_POST['endereco_consultorio'];
        
        $model = $this->model->find($_POST['id']);
        if(!$model){
            $object->senha = $this->hashPass($_POST['senha']);
            $this->model->store($object);
        }else{
            $object->senha = $_POST['senha'] === ""
                ? $model->senha
                : $this->hashPass($_POST['senha']);
            $this->model->update($object);
        }
        
        header('Location: index.php');
    }

    public function destroy()
    {
        $this->model->delete($_GET['id']);
        header('Location: index.php');
    }

    private function hashPass(String $pass) : String
    {
        return crypt($pass);
    }
}