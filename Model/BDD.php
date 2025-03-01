<?php

class BDD{

    private static $instance = null;
    private $connexion;
    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new BDD();
        }
        return self::$instance ;
    }

    private function __construct() 
    {
        $dsn = "mysql:host=localhost;dbname=module6;charset=utf8mb4";
        $login = "root";
        $password = "root";

        $this->connexion = new PDO($dsn, $login, $password);
    }

    public function query(string $sql, array $params = []){
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute($params);
        if(str_starts_with($sql, "INSERT INTO")){
            return $this->connexion->lastInsertId();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}