<?php

namespace App\models;

use App\core\ORM;

class Media extends ORM {

    protected $id;
    protected $name;
    protected $type;
    protected $size;
    protected $description;
    protected $created_at;
    protected $updated_at;
    protected $identifier;
    protected $fp_recipe_id;

    public function __construct()
    {
        $this->setCreatedAt(time());
        $this->setUpdatedAt(time());
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
        $this->name = ucwords(strtolower(trim($name)));
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = ucwords(strtolower(trim($type)));
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = ucwords(strtolower(trim($description)));
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): void
    {
        $this->identifier = ucwords(strtolower(trim($identifier)));
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
    public function setCreatedAt(Int $created_at): void
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
     * @param Integer $updated_at
     */
    public function setUpdatedAt(Int $updated_at): void
    {
        $this->updated_at = date("Y-m-d h:i:s", $updated_at);
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