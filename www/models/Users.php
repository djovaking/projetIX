<?php


namespace App\models;

use App\core\ORM;

class Users extends ORM
{

    protected $id = -1;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password	;
    protected $date_created;
    protected $date_updated;
    protected $status = 0;
    protected $user_role = 0;
    protected $identifier = "default";


    public function __construct()
    {
        parent::__construct();
        $this->setDateInserted(time());
        $this->setDateUpdated(time());
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    /**
     * @return string
     */
    public function getpassword	(): string
    {
        return $this->password	;
    }

    /**
     * @param string $password	
     */
    public function setpassword	(string $password	): void
    {
        $this->password	 = password_hash($password	, PASSWORD_DEFAULT);
    }

    /**
     * @return Integer
     */
    public function getDateInserted(): int
    {
        return $this->date_created;
    }

    /**
     * @param Integer $date_created
     */
    public function setDateInserted(Int $date_created): void
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
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
    //role
    public function getRoleId()
    {
        return $this->user_role;
    }
    public function setRole(int $user_role): void
    {
        $this->user_role = $user_role;
    }
}
