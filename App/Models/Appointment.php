<?php

namespace App\Models;

use App\Utils\DB;
use App\Models\Patient;

class Appointment
{
    private $id;
    private $idPatients;
    private $dateHour;

    static public function findAll()
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT * FROM `appointments` ORDER BY `dateHour`";

        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    static public function findById(int $id)
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT * 
         FROM `appointments` 
         WHERE id = " . $id;

        $pdoStatement = $pdoDBConnexion->query($sql);

        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, self::class);

        return $pdoStatement->fetch();
    }

    static public function findByIdPatients(int $idPatients)
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT * 
         FROM `appointments` 
         WHERE `idPatients` = " . $idPatients;

        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function create()
    {
        $pdoDBConnexion = DB::getPdo();

        $sql =
            "INSERT INTO 
                `appointments` (`dateHour`, `idPatients`) 
            VALUES 
                ('{$this->getDateHour()}', '{$this->getIdPatients()}')";

        $pdoDBConnexion->query($sql);
    }

    public function update()
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "UPDATE `appointments` 
            SET `dateHour` = '{$this->getDateHour()}',
                `idPatients` = '{$this->getIdPatients()}'
            WHERE `appointments`.`id` = {$this->getId()}";

        $pdoDBConnexion->query($sql);
    }

    public function delete()
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "DELETE FROM `appointments`
            WHERE `appointments`.`id` = {$this->getId()}";

        $pdoDBConnexion->query($sql);
    }

    public function deleteByIdPatients()
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "DELETE FROM `appointments`
            WHERE `appointments`.`idPatients` = {$this->getIdPatients()}";

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
     * Get the value of idPatients
     */
    public function getIdPatients()
    {
        return $this->idPatients;
    }

    /**
     * Set the value of idPatients
     *
     * @return  self
     */
    public function setIdPatients($idPatients)
    {
        $this->idPatients = $idPatients;

        return $this;
    }

    /**
     * Get the value of dateHour
     */
    public function getDateHour()
    {
        return $this->dateHour;
    }

    /**
     * Set the value of dateHour
     *
     * @return  self
     */
    public function setDateHour($dateHour)
    {
        $this->dateHour = $dateHour;

        return $this;
    }

    /**
     * Get the value of patientFirstname
     */
    public function getPatientName(int $idPatients)
    {
        $patient = Patient::findById($idPatients);
        return $patient->getLastName() . " " . $patient->getFirstName();
    }
}
