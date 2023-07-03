<?php

namespace App\models;

use App\core\ORM;

class Reservation extends ORM {

    protected $id;
    protected $date;
    protected $time;
    protected $nb_person;
    protected $firstname;
    protected $lastname;
    protected $phone;
    protected $fp_user_id;

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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getNbPerson(): int
    {
        return $this->nb_person;
    }

    /**
     * @param int $nb_person
     */
    public function setNbPerson(int $nb_person): void
    {
        $this->nb_person = $nb_person;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = strtoupper(trim($phone));
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
}