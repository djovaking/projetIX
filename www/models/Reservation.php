<?php

namespace App\models;

use App\core\ORM;

class Reservation extends ORM
{
    protected $id = -1;
    protected $date;
    protected $time;
    protected $nb_person;
    protected $firstName;
    protected $lastName;
    protected $phone;
    protected $userId;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
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
    public function getnb_person(): int
    {
        return $this->nb_person;
    }

    /**
     * @param int $nb_person
     */
    public function setnb_person(int $nb_person): void
    {
        $this->nb_person = $nb_person;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
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
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function delete(): bool
    {
        // Implémenter la logique pour supprimer la réservation de la base de données

        // Exemple basique :
        $deleted = $this->db->delete('reservations', ['id' => $this->getId()]);

        return $deleted;
    }

    public function update(): void
    {
        // Implémenter la logique pour mettre à jour la réservation de la base de données

        // Exemple basique :
        $updated = $this->db->update('reservations', ['id' => $this->getId()]);

       // return $updated;
    }
}
