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
     * URLPATH: /appointments/create
     * METHOD: POST
     */
    public function createAppointment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form = new Appointment;
            $form->setDateHour(htmlspecialchars($_POST['dateHour']));
            $form->setIdPatients(htmlspecialchars($_POST['idPatients']));
            $form->create();
            header('Location: /appointments');
        } else {
            $patients = Patient::findAll();
            $this->render('appointment/ajout-rendezvous', [
                "patients" => $patients,
            ]);
        }
    }
}
