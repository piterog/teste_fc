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
			$stm->execute([$id]);
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }

    public function store(Medico $data)
	{
        $now = date("Y-m-d H:i:s");

		try {
		    $sql = "INSERT INTO ".$this->table." (email,nome,senha,endereco_consultorio,data_criacao,data_alteracao) VALUES (?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute([
                            $data->email, $data->nome, $data->senha, 
                            $data->endereco_consultorio, $now, $now
                        ]);
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }
    
    public function update($data)
	{
        $now = date("Y-m-d H:i:s");

		try {
			$sql = "UPDATE ".$this->table." SET email = ?,nome = ?,senha = ?,endereco_consultorio = ?,data_alteracao = ?					
				    WHERE id = ?";

			$this->pdo->prepare($sql)->execute([
				    	$data->email, $data->nome, $data->senha, 
                        $data->endereco_consultorio, $now,
                        $data->id
                    ]);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
    
    public function delete($id)
	{
		try {
			$stm = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id = ?");			          

			$stm->execute([$id]);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}