<?php

namespace App\Controllers;

use App\Models\Patient;
use App\Models\Appointment;

class PatientController extends CoreController
{
    /**
     * URLPATH: /patients OU /patients?id={id}&page={page}
     * METHOD: GET
     */
    public function listPatient()
    {
        $search = filter_input(INPUT_GET, 'search');

        $page = filter_input(INPUT_GET, 'page');

        if ($page == NULL) {
            $currentPage = 1;
        } else {
            $currentPage = $page;
        }

        if ($search == NULL) {
            $results = Patient::findAllWithPagination($currentPage);
            $patients = $results['patients'];
            $header = $results['header'];
            $this->render('patient/liste-patients', [
                "patients" => $patients,
                "header" => $header,
            ]);
        } else {
            $results = Patient::searchWithPagination($search, $currentPage);
            $patients = $results['patients'];
            $header = $results['header'];
            $this->render('patient/liste-patients', [
                "patients" => $patients,
                "header" => $header,
            ]);
        }
    }

    /**
     * URLPATH: /patients/profil?id={id}
     * METHOD: GET
     */
    public function profilPatient()
    {
        $patient = Patient::findById(filter_input(INPUT_GET, 'id'));

        if ($patient == FALSE) {
            header('Location: /404');
        } else {
            $appointments = Appointment::findByIdPatients($patient->getId());
            $this->render("patient/profil-patient", [
                "patient" => $patient,
                "appointments" => $appointments,
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
            $form->setLastname(filter_input(INPUT_POST, 'lastname'));
            $form->setFirstname(filter_input(INPUT_POST, 'firstname'));
            $form->setBirthdate(filter_input(INPUT_POST, 'birthdate'));
            $form->setMail(filter_input(INPUT_POST, 'mail'));
            $form->setPhone(filter_input(INPUT_POST, 'phone'));
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
            $form->setLastname(filter_input(INPUT_POST, 'lastname'));
            $form->setFirstname(filter_input(INPUT_POST, 'firstname'));
            $form->setBirthdate(filter_input(INPUT_POST, 'birthdate'));
            $form->setMail(filter_input(INPUT_POST, 'mail'));
            $form->setPhone(filter_input(INPUT_POST, 'phone'));
            $form->setId(filter_input(INPUT_POST, 'id'));
            $form->update();
            header('Location: /patients');
        } else {
            $this->render('patient/ajout-patient', []);
        }
    }

    /**
     * URLPATH: /patients/delete
     * METHOD: POST
     */
    public function deletePatient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Patient;
            $form->setId(filter_input(INPUT_POST, 'id'));
            $form->delete();
            header('Location: /patients');
        } else {
            $patients = Patient::findAll();
            $this->render('patients/liste-patients', [
                "patients" => $patients,
            ]);
        }
    }
}
