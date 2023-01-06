<?php

namespace App\Controllers;

use App\Controllers\PatientController;

class MainController extends CoreController
{

    /**
     * URLPATH: /
     * METHOD: GET
     */
    public function index()
    {
        $this->render("main/index", []);
    }

    /**
     * URLPATH: /404 OR Any wrong path
     * METHOD: GET
     */
    public function notFound()
    {
        $this->render("main/404", []);
    }
}
