<?php

namespace App\Models;

use App\Utils\DB;

class Patient
{
    private $id;
    private $lastname;
    private $firstname;
    private $birthdate;
    private $phone;
    private $mail;

    static public function findAll()
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT `firstname`, `lastname`, `id` FROM `patients` ORDER BY `lastname`";

        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    static public function findById(int $id)
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT * 
         FROM `patients` 
         WHERE id = " . $id;

        $pdoStatement = $pdoDBConnexion->query($sql);

        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, self::class);

        return $pdoStatement->fetch();
    }

    public function create()
    {
        $pdoDBConnexion = DB::getPdo();

        if ($this->getPhone() != '') {
            $this->setPhone("'" . $this->getPhone() . "'");
        } else {
            $this->setPhone('NULL');
        };

        $sql =
            "INSERT INTO 
                `patients` (`lastname`, `firstname`, `birthdate`, `mail`, `phone`) 
            VALUES 
                ('{$this->getLastname()}', '{$this->getFirstname()}', '{$this->getBirthdate()}', '{$this->getMail()}', {$this->getPhone()})";

        $pdoDBConnexion->query($sql);
    }

    public function update()
    {
        $pdoDBConnexion = DB::getPdo();

        if ($this->getPhone() != '') {
            $this->setPhone("'" . $this->getPhone() . "'");
        } else {
            $this->setPhone('NULL');
        };

        $sql =
            "UPDATE `patients` 
            SET `lastname` = '{$this->getLastname()}',
                `firstname` = '{$this->getFirstname()}',
                `birthdate` = '{$this->getBirthdate()}',
                `phone` = {$this->getPhone()},
                `mail` = '{$this->getMail()}' 
            WHERE `patients`.`id` = {$this->getId()};";
        $pdoDBConnexion->query($sql);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }
}
