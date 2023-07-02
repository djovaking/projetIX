<?php

namespace App\models;

use App\core\ORM;

class Recipe extends ORM {

    protected $id;
    protected $name;
    protected $time_preparation;
    protected $difficulty;
    protected $preparation;
    protected $created_at;
    protected $updated_at;
    protected $slug;
    protected $active;
    protected $identifier;
    protected $nb_view;

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
    public function getTimePreparation(): string
    {
        return $this->time_preparation;
    }

    /**
     * @param string $time_preparation
     */
    public function setTimePreparation(string $time_preparation): void
    {
        $this->time_preparation = ucwords(strtolower(trim($time_preparation)));
    }

    /**
     * @return string
     */
    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    /**
     * @param string $name
     */
    public function setDifficulty(string $difficulty): void
    {
        $this->difficulty = ucwords(strtolower(trim($difficulty)));
    }

    /**
     * @return string
     */
    public function getPreparation(): string
    {
        return $this->preparation;
    }

    /**
     * @param string $preparation
     */
    public function setPreparation(string $preparation): void
    {
        $this->preparation = ucwords(strtolower(trim($preparation)));
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = ucwords(strtolower(trim($slug)));
    }

    /**
     * @return string
     */
    public function getActive(): string
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive(string $active): void
    {
        $this->active = $active;
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
     * @return int
     */
    public function getNbView(): int
    {
        return $this->nb_view;
    }

    /**
     * @param int $nb_views
     */
    public function setNbView(int $nb_view): void
    {
        $this->nb_view = $nb_view;
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
}