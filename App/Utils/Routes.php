<?php

use App\Controllers\MainController;
use App\Controllers\PatientController;
use App\Controllers\AppointmentController;

$url = parse_url($_SERVER['REQUEST_URI']);

try {

    switch ($url['path']) {
        case "/":
            $mainController = new MainController();
            $mainController->index();
            break;
        case "/patients":
            $patientController = new PatientController();
            $patientController->listPatient();
            break;
        case "/patients/create":
            $patientController = new PatientController();
            $patientController->createPatient();
            break;
        case "/patients/profil":
            $patientController = new PatientController();
            $patientController->ProfilPatient();
            break;
        case "/patients/update":
            $patientController = new PatientController();
            $patientController->updatePatient();
            break;
        case "/appointments":
            $appointmentController = new AppointmentController();
            $appointmentController->listAppointment();
            break;
        case "/appointments/create":
            $appointmentController = new AppointmentController();
            $appointmentController->createAppointment();
            break;
        case "/404":
            $mainController = new MainController();
            $mainController->notFound();
            break;
        default:
            $mainController = new MainController();
            $mainController->notFound();
            break;
    }
} catch (Exception $e) {
    http_response_code($e->getCode());
    echo $e->getMessage();
}
