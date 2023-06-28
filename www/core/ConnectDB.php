<?php

namespace App\core;

final class ConnectDB
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        try {
            $this->pdo = new \PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PWD);
        } catch (\Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }

    public static function getInstance(): ConnectDB
    {
        if (!isset(self::$instance)) {
            self::$instance = new ConnectDB();
        }

        return self::$instance;
    }

    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    public function getAll($table)
    {
        // Prepare the SQL query to fetch all records from the specified table
        $query = "SELECT * FROM " . $table;
        $statement = $this->pdo->prepare($query);

        // Execute the query
        $statement->execute();

        // Fetch all records
        $records = $statement->fetchAll(\PDO::FETCH_ASSOC);

        // Return the list of records
        return $records;
    }
    
    public function getBy($table, $column, $value)
    {
        // Prepare the SQL query to fetch a record from the specified table based on the column value
        $query = "SELECT * FROM " . $table . " WHERE " . $column . " = :value";
        $statement = $this->pdo->prepare($query);

        // Bind the parameter
        $statement->bindParam(':value', $value);

        // Execute the query
        $statement->execute();

        // Fetch the record as an object
        $record = $statement->fetch(\PDO::FETCH_OBJ);

        // Return the record
        return $record;
    }
}
