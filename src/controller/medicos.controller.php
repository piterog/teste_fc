<?php

require_once("model/Medico.php");

class MedicosController{
    
    private $model;
    private $errors;
    
    public function __construct()
    {
        $this->model = new Medico();
    }

    public function index()
    {
        require_once("view/medicos/index.php");
    }

    public function create()
    {
        $model = new Medico();
        
        require_once("view/medicos/edit.php");
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

        if($this->validation($_POST) == false){
            $error_messages = $this->errors;

            require_once("view/medicos/edit.php");
            exit();
        }
        
        $object->id                      = $_POST['id'];
        $object->nome                    = $_POST['nome'];
        $object->email                   = $_POST['email'];
        $object->senha                   = $_POST['senha'];
        $object->endereco_consultorio    = $_POST['endereco_consultorio'];
        
        $model = $this->model->find($_POST['id']);
        if(!$model){
            $object->senha = $this->hashPass($_POST['senha']);
            $this->model->store($object);
            $toast = 'create';
        }else{
            $object->senha = $_POST['senha'] === ""
                ? $model->senha
                : $this->hashPass($_POST['senha']);

            $object->email = $model->email;
            $this->model->update($object);
            $toast = 'update';
        }
        
        header('Location: index.php?toast='.$toast);
    }

    public function destroy()
    {
        $this->model->delete($_GET['id']);
        header('Location: index.php?toast=delete');
    }

    private function hashPass(String $pass) : String
    {
        return crypt($pass);
    }

    private function validation(Array $request)
    {
        $errors = "";

        $_POST = filter_var_array($request, FILTER_SANITIZE_SPECIAL_CHARS);
        
        foreach($_POST as $k => $data){
            if($k != 'id'){
                if($k != 'senha'){          
                    if(strlen($data) <= 6 || strlen($data) > 112){
                        $errors .= "O campo ".$k." precisa ter entre 6 e 112 caracteres;";
                        $errors .= "<br>";
                    }
                }else{
                    if(strlen($data) > 0){
                        if(strlen($data) <= 6 || strlen($data) > 112){
                            $errors .= "O campo ".$k." precisa ter entre 6 e 112 caracteres;";
                            $errors .= "<br>";
                        }
                    }
                }
            }
        }

        if($_POST['id'] != ""){
            if(!filter_var($_POST['id'], FILTER_VALIDATE_INT)){
                $errors .= "O ID do médico precisa ser um inteiro e válido;";
                $errors .= "<br>";
            }
        }else{
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors .= "O email precisa ter um formato válido;";
                $errors .= "<br>";
            }
        }

        $this->errors = $errors;

        return ($errors == "") ? true: false;
    }
}