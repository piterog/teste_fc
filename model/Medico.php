<?php
class Medico
{
    private $pdo;
    private $table;

	public function __construct()
	{
		try{
            $this->pdo = Database::Connection();     
            $this->table = "fc_medicos";
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function all()
	{
		try{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM ".$this->table);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function find($id)
	{
		try{
			$stm = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE id = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}