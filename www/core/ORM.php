<?php
namespace App\core;

abstract class ORM{

    private $table;
    private $pdo;

    public function __construct(){
        $this->table = self::getTable();
        $connectDb = new ConnectDB();
        $this->pdo = $connectDb->getPdo();
    }


    public abstract function getId(): int;
    public abstract function setId(int $id): void;

    public static function getTable(): string
    {
        $classExploded = explode("\\", get_called_class());
        return DB_PREFIX.strtolower(end($classExploded));
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
        $connectDb = new ConnectDB();
        $queryPrepared = $connectDb->getPdo()->prepare("SELECT * FROM ".self::getTable().
                            " WHERE ".$column."=:".$column);
        $queryPrepared->execute([$column=>$value]);
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $objet = $queryPrepared->fetch();
        return $objet;
    }
    public function save():void
    {
        $columns = get_object_vars($this);
        $columnsToDelete = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToDelete );

        if($columns["id"] == -1){
            unset($columns["id"]);
            $queryPrepared = $this->pdo->prepare("INSERT INTO ".$this->table." ( ".implode(", ", array_keys($columns))." ) ".
                " VALUES (:".implode(",:", array_keys($columns)).")");
        }else{
            print_r($columns);
            unset($columns["id"]);
            $sqlUpdate = [];
            foreach ($columns as $key=>$value){
                $sqlUpdate[]= $key."=:".$key;
            }

            $queryPrepared = $this->pdo->prepare("UPDATE ".$this->table.
                 " SET ".implode(",", $sqlUpdate).
                 " WHERE id=".$this->getId());
        }
        $queryPrepared->execute($columns);

        /*
         * Pour la prochaine fois (le 16 Mai) réalisez le code permettant d'utiliser
         * la methode SAVE aussi pour réaliser un UPDATE SQL, Si l'ID est différent
         * de -1 il faut partir du principe que c'est un update
         */

    }

}