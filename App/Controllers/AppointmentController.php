<?php

namespace App\Controllers;

use App\Models\Patient;
use App\Models\Appointment;

class AppointmentController extends CoreController
{
    /**
     * URLPATH: /appointments
     * METHOD: GET
     */
    public function listAppointment()
    {
        $appointments = Appointment::findAll();

        $this->render('appointment/liste-rendezvous', [
            "appointments" => $appointments,
        ]);
    }

    /**
     * URLPATH: /appointments/details?id={id}
     * METHOD: GET
     */
    public function detailsAppointment()
    {
        $appointment = Appointment::findById(filter_input(INPUT_GET, 'id'));

        if ($appointment == FALSE) {
            header('Location: /404');
        } else {
            $patients = Patient::findAll();
            $this->render("appointment/rendezvous", [
                "appointment" => $appointment,
                "patients" => $patients
            ]);
        }
    }

    /**
     * URLPATH: /appointments/create
     * METHOD: POST
     */
    public function createAppointment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Appointment;
            $form->setDateHour(filter_input(INPUT_POST, 'dateHour'));
            $form->setIdPatients(filter_input(INPUT_POST, 'idPatients'));
            $form->create();
            header('Location: /appointments');
        } else {
            $patients = Patient::findAll();
            $this->render('appointment/ajout-rendezvous', [
                "patients" => $patients,
            ]);
        }
    }

    /**
     * URLPATH: /appointments/update
     * METHOD: POST
     */
    public function updateAppointment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Appointment;
            $form->setDateHour(filter_input(INPUT_POST, 'dateHour'));
            $form->setIdPatients(filter_input(INPUT_POST, 'idPatients'));
            $form->setId(filter_input(INPUT_POST, 'id'));
            $form->update();
            header('Location: /appointments');
        } else {
            $patients = Patient::findAll();
            $this->render('appointment/ajout-rendezvous', [
                "patients" => $patients,
            ]);
        }
    }

    /**
     * URLPATH: /appointments/delete
     * METHOD: POST
     */
    public function deleteAppointment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Appointment;
            $form->setId(filter_input(INPUT_POST, 'id'));
            $form->delete();
            header('Location: /appointments');
        } else {
            $patients = Patient::findAll();
            $this->render('appointment/liste-rendezvous', [
                "patients" => $patients,
            ]);
        }
    }
}
