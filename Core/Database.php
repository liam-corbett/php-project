<?php

class Database {

    public $connection;
    public $statements;

    public function __construct($config, $username = "root", $password = "") {



        $dsn = "mysql:" . http_build_query($config, "", ";"); //host=localhost;port=3306;dbname=myapp;charset=utf8mb4

        // $dsn = "mysql:host={$config["host"]};port={$config["port"]};dbname={$config["dbname"]};charset={$config["charset"]}";

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        
    }

    public function query($query, $params = []) {

        $this->statements = $this->connection->prepare($query);

        $this->statements->execute($params);

        return $this;  

    } 

    public function get() {

        return $this->statements->fetchAll();

    }

    public function find() {

        return $this->statements->fetch();

    }

    public function findOrFail() {

        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;

    }
}