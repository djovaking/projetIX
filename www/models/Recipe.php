<?php

namespace App\models;

use App\core\ORM;
use DateTime;

class Recipe extends ORM
{

    protected $id;
    protected $name;
    protected $time_preparation;
    protected $difficulty;
    protected $preparation;
    protected $created_at;
    protected $updated_at;



    public function __construct()
    {
        parent::__construct();
        $this->setCreatedAt(time());
        $this->setUpdatedAt(time());
    }

    public function __toString(): string
    {
        return serialize($this);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = trim($name);
    }

    /**
     * @return string
     */
    public function getTimePreparation(): string
    {
        return $this->time_preparation;
    }

    /**
     * @param string $time_preparation
     */
    public function setTimePreparation(string $time_preparation): void
    {
        $this->time_preparation = trim($time_preparation);
    }

    /**
     * @return string
     */
    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    /**
     * @param string $difficulty
     */
    public function setDifficulty(string $difficulty): void
    {
        $this->difficulty = trim($difficulty);
    }

    /**
     * @return string
     */
    public function getPreparation(): string
    {
        return $this->preparation;
    }

    /**
     * @param string $difficulty
     */
    public function setPreparation(string $preparation): void
    {
        $this->preparation = trim($preparation);
    }

    /**
     * @return Integer
     */
    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    /**
     * @param Integer $created_at
     */
    public function setCreatedAt(int $created_at): void
    {
        $this->created_at = date("Y-m-d h:i:s", $created_at);
    }

    /**
     * @return Integer
     */
    public function getUpdatedAt(): Int
    {
        return $this->updated_at;
    }

    /**
     * @param Integer $date_updated
     */
    public function setUpdatedAt(Int $updated_at): void
    {
        $this->updated_at = date("Y-m-d h:i:s", $updated_at);
    }
}
