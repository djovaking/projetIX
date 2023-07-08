<?php

namespace App\core;

abstract class ORM
{

    private $table;
    private $pdo;

    public function __construct()
    {
        $this->table = self::getTable();
        $connectDb = ConnectDB::getInstance();
        $this->pdo = $connectDb->getPdo();
    }


    public abstract function getId(): int;
    public abstract function setId(int $id): void;

    public static function getTable(): string
    {
        $classExploded = explode("\\", get_called_class());
        return DB_PREFIX . strtolower(end($classExploded));
    }
    /**
     * @param int $id
     */
    public static function populate(int $id)
    {
        return self::getOneBy("id", $id);
    }

    public static function getOneBy($column, $value)
    {
        $connectDb = ConnectDB::getInstance();
        $queryPrepared = $connectDb->getPdo()->prepare("SELECT * FROM " . self::getTable() .
            " WHERE " . $column . "=:" . $column);
        $queryPrepared->execute([$column => $value]);
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $objet = $queryPrepared->fetch();
        return $objet;
    }
    public function save(): void
    {
        $columns = get_object_vars($this);
        $columnsToDelete = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToDelete);

        if ($columns["id"] == -1) {
            unset($columns["id"]);
            $queryPrepared = $this->pdo->prepare("INSERT INTO " . $this->table . " ( " . implode(", ", array_keys($columns)) . " ) " .
                " VALUES (:" . implode(",:", array_keys($columns)) . ")");
        } else {
            print_r($columns);
            unset($columns["id"]);
            $sqlUpdate = [];
            foreach ($columns as $key => $value) {
                $sqlUpdate[] = $key . "=:" . $key;
            }

            $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table .
                " SET " . implode(",", $sqlUpdate) .
                " WHERE id=" . $this->getId());
        }
        $queryPrepared->execute($columns);
    }
    public function update(): void
    {
        $connectDb = ConnectDB::getInstance();
        if ($this->getId() === -1) {
            throw new \Exception("Cannot update object without an ID");
        }

        $columns = get_object_vars($this);
        $columnsToDelete = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToDelete);
        unset($columns["id"]);

        $sqlUpdate = [];
        $queryParameters = [];

        foreach ($columns as $key => $value) {
            if ($value !== null) {
                $sqlUpdate[] = $key . "=:" . $key;
                $queryParameters[$key] = $value;
            }
        }

        $queryPrepared = $connectDb->getPdo()->prepare("UPDATE " . self::getTable() .
            " SET " . implode(",", $sqlUpdate) .
            " WHERE id=" . $this->getId());

        $queryPrepared->execute($queryParameters);
    }

    public static function getByEmail($email)
    {
        $connectDb = ConnectDB::getInstance();
        $queryPrepared = $connectDb->getPdo()->prepare("SELECT * FROM " . self::getTable() .
            " WHERE email=:email");
        $queryPrepared->execute(['email' => $email]);
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $user = $queryPrepared->fetch();

        // Retrieve the role_id from the user table
        if ($user) {
            $user->user_role = $user->user_role;
        }


        return $user;
    }
    public static function deleteBy($column, $value): void
    {
        $connectDb = ConnectDB::getInstance();
        $pdo = $connectDb->getPdo();
        $table = self::getTable();

        $query = $pdo->prepare("DELETE FROM $table WHERE $column = :value");
        $query->bindParam(':value', $value);
        $query->execute();
    }

    public static function dropFKConstraint($table, $constraint): void
    {
        $connectDb = ConnectDB::getInstance();
        $pdo = $connectDb->getPdo();

        $query = $pdo->prepare("ALTER TABLE $table DROP CONSTRAINT $constraint");
        $query->execute();
    }

    public static function deleteDatasInTheFKTable($table, $foreignKey, $value): void
    {
        $connectDb = ConnectDB::getInstance();
        $pdo = $connectDb->getPdo();

        $query = $pdo->prepare("DELETE FROM $table WHERE $foreignKey = :value");
        $query->bindParam(':value', $value);
        $query->execute();
    }

    public static function restoreFKConstraint($table, $constraint, $referencedColumn, $referencedTable): void
    {
        $connectDb = ConnectDB::getInstance();
        $pdo = $connectDb->getPdo();

        $query = $pdo->prepare("ALTER TABLE $table ADD CONSTRAINT $constraint FOREIGN KEY ($referencedColumn) REFERENCES public.$referencedTable (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID");
        $query->execute();
    }
}
