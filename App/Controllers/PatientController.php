<?php

namespace App\Controllers;

use App\Models\Patient;

class PatientController extends CoreController
{
    /**
     * URLPATH: /patients
     * METHOD: GET
     */
    public function listPatient()
    {
        $patients = Patient::findAll();

        $this->render('patient/liste-patients', [
            "patients" => $patients,
        ]);
    }

    /**
     * URLPATH: /patients/profil?id={id}
     * METHOD: GET
     */
    public function profilPatient()
    {
        $patient = Patient::findById(htmlspecialchars($_GET['id']));

        if ($patient == FALSE) {
            header('Location: /404');
        } else {
            $this->render("patient/profil-patient", [
                "patient" => $patient
            ]);
        }
    }

    /**
     * URLPATH: /patients/create
     * METHOD: POST
     */
    public function createPatient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Patient;
            $form->setLastname(htmlspecialchars($_POST['lastname']));
            $form->setFirstname(htmlspecialchars($_POST['firstname']));
            $form->setBirthdate(htmlspecialchars($_POST['birthdate']));
            $form->setMail(htmlspecialchars($_POST['mail']));
            $form->setPhone(htmlspecialchars($_POST['phone']));
            $form->create();
            header('Location: /patients');
        } else {
            $this->render('patient/ajout-patient', []);
        }
    }

    /**
     * URLPATH: /patients/update
     * METHOD: POST
     */
    public function updatePatient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Patient;
            $form->setLastname(htmlspecialchars($_POST['lastname']));
            $form->setFirstname(htmlspecialchars($_POST['firstname']));
            $form->setBirthdate(htmlspecialchars($_POST['birthdate']));
            $form->setMail(htmlspecialchars($_POST['mail']));
            $form->setPhone(htmlspecialchars($_POST['phone']));
            $form->setId(htmlspecialchars($_POST['id']));
            $form->update();
            header('Location: /patients');
        } else {
            $this->render('patient/ajout-patient', []);
        }
    }
}
