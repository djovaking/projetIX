<?php

namespace App\models;

use App\core\ORM;

class Page extends ORM {

    protected $id;
    protected $name;
    protected $slug;
    protected $active;
    protected $date_created;
    protected $date_updated;
    protected $parent_id;
    protected $identifier;
    protected $nb_view;

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

    public function getParentId()
    {
        return $this->parent_id;
    }

    public function setParentId(int $parent_id): void
    {
        $this->parent_id = $parent_id;
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
}