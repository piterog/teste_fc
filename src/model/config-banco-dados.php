<?php

define("DB_HOST", "127.0.0.1");
define("DB_NAME", "teste_fc");
define("DB_USER", "root");
define("DB_PASS", "123123");


class Database
{
    public static function Connection()
    {
        try {
            $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            return $pdo;
        } catch(PDOException $e) {
            die("Falha na conexão: " . $e->getMessage());
        }
    }
}