<?php

namespace App\models;

use App\core\ORM;

class Comment extends ORM {

    protected $id;
    protected $text;
    protected $date_created;
    protected $date_updated;
    protected $fp_user_id;
    protected $fp_recipe_id;

    public function __construct()
    {
        $this->setDateCreated(time());
        $this->setDateUpdated(time());
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
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = ucwords(strtolower(trim($text)));
    }

    /**
     * @return Integer
     */
    public function getDateCreated(): int
    {
        return $this->date_created;
    }

    /**
     * @param Integer $date_created
     */
    public function setDateCreated(Int $date_created): void
    {
        $this->date_created = date("Y-m-d h:i:s", $date_created);
    }

    /**
     * @return Integer
     */
    public function getDateUpdated(): Int
    {
        return $this->date_updated;
    }

    /**
     * @param Integer $date_updated
     */
    public function setDateUpdated(Int $date_updated): void
    {
        $this->date_updated = date("Y-m-d h:i:s", $date_updated);
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->fp_user_id;
    }

    public function setUserId(int $fp_user_id): void
    {
        $this->fp_user_id = $fp_user_id;
    }

    /**
     * @return int
     */
    public function getRecipeId(): int
    {
        return $this->fp_recipe_id;
    }

    public function setRecipeId(int $fp_recipe_id): void
    {
        $this->fp_recipe_id = $fp_recipe_id;
    }
}