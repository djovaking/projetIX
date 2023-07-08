<?php

namespace App\models;

use App\core\ORM;

class Setting extends ORM {

    protected $id;
    protected $color;
    protected $font;

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
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = ucwords(strtolower(trim($color)));
    }

    /**
     * @return string
     */
    public function getFont(): string
    {
        return $this->font;
    }

    /**
     * @param string $font
     */
    public function setFont(string $font): void
    {
        $this->font = strtoupper(trim($font));
    }
}