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

    static public function findAllWithPagination($page)
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT COUNT(*) AS numberOfPages FROM `patients`";

        $result = $pdoDBConnexion->query($sql)->fetch()['numberOfPages'];

        if ($result == 0) {
            $header['currentPage'] = 1;
            $header['numberOfPages'] = 0;
            $header['search'] = NULL;
            $results['patients'] = NULL;
            $results['header'] = $header;
            return $results;
        }

        $numberOfPages = ceil($result / 4);

        $page = (($page * 4) - 4);

        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT `firstname`, `lastname`, `id` FROM `patients` ORDER BY `lastname` LIMIT {$page}, 4";

        $pdoStatement = $pdoDBConnexion->query($sql);

        $patients = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
        $header['currentPage'] = ($page / 4) + 1;
        $header['numberOfPages'] = $numberOfPages;
        $header['search'] = NULL;
        $results['patients'] = $patients;
        $results['header'] = $header;
        return $results;
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

    static public function searchWithPagination($search, $page)
    {
        $pdoDBConnexionNumber = DB::getPdo();

        $sql = "SELECT COUNT(*) AS numberOfPages FROM `patients` WHERE `firstname` LIKE '%{$search}%' OR `lastname` LIKE '%{$search}%'";

        $result = $pdoDBConnexionNumber->query($sql)->fetch()['numberOfPages'];

        if ($result == 0) {
            $header['currentPage'] = 1;
            $header['numberOfPages'] = 0;
            $header['search'] = $search;
            $results['patients'] = NULL;
            $results['header'] = $header;
            return $results;
        }

        $numberOfPages = ceil($result / 4);

        $page = (($page * 4) - 4);

        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT `firstname`, `lastname`, `id` FROM `patients` 
        WHERE `firstname` LIKE '%{$search}%' OR `lastname` LIKE '%{$search}%'
        ORDER BY `lastname` LIMIT {$page}, 4";

        $pdoStatement = $pdoDBConnexion->query($sql);

        $patients = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
        $header['currentPage'] = ($page / 4) + 1;
        $header['numberOfPages'] = $numberOfPages;
        $header['search'] = $search;
        $results['patients'] = $patients;
        $results['header'] = $header;
        return $results;
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
                ('{$this->getLastname()}', '{$this->getFirstname()}', '{$this->getBirthdate()}', '{$this->getMail()}', {$this->getPhone()});
            SELECT LAST_INSERT_ID();";

        $pdoDBConnexion->query($sql);

        $pdoDBConnexionIdPatient = DB::getPdo();

        $sql = "SELECT LAST_INSERT_ID();";

        $patientId = $pdoDBConnexionIdPatient->query($sql)->fetch()['LAST_INSERT_ID()'];

        $this->setId($patientId);
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

        $pdoStatement = $pdoDBConnexion->query($sql);
    }

    public function delete()
    {
        $appointment = new Appointment;
        $appointment->setIdPatients($this->getId());
        $appointment->deleteByIdPatients();

        $pdoDBConnexion = DB::getPdo();

        $sql =
            "DELETE FROM `patients`
            WHERE `patients`.`id` = {$this->getId()}";

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
