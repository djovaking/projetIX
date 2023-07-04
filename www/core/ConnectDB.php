<?php

namespace App\core;

final class ConnectDB
{
    private $pdo;
    public function __construct()
    {
        try {
            $this->pdo = new \PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASSWORD	);
        } catch (\Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }

    public function getPdo()
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
    
    public function delete($table, $id)
    {
        // Prepare the SQL query to delete the specified record from the table
        $query = "DELETE FROM " . $table . " WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        
        // Bind the ID parameter
        $statement->bindParam(':id', $id);
        
        // Execute the query
        $statement->execute();
        
        // Return the number of affected rows
        return $statement->rowCount();
    }
}
