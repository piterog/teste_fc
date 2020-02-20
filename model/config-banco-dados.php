<?php
class Database
{
    public static function Connection()
    {
        try {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=teste_fc;charset=utf8', 'root', '123123');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            return $pdo;
        } catch(PDOException $e) {
            die("Falha na conexão: " . $e->getMessage());
        }
    }
}