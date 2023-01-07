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
            $patientController->profilPatient();
            break;
        case "/patients/update":
            $patientController = new PatientController();
            $patientController->updatePatient();
            break;
        case "/patients/delete":
            $patientController = new PatientController();
            $patientController->deletePatient();
            break;
        case "/patient-appointment/create":
            $patientController = new PatientController();
            $patientController->createPatientWithAppointment();
            break;
        case "/appointments":
            $appointmentController = new AppointmentController();
            $appointmentController->listAppointment();
            break;
        case "/appointments/create":
            $appointmentController = new AppointmentController();
            $appointmentController->createAppointment();
            break;
        case "/appointments/details":
            $appointmentController = new AppointmentController();
            $appointmentController->detailsAppointment();
            break;
        case "/appointments/update":
            $appointmentController = new AppointmentController();
            $appointmentController->updateAppointment();
            break;
        case "/appointments/delete":
            $appointmentController = new AppointmentController();
            $appointmentController->deleteAppointment();
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
