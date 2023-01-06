<?php

namespace App\Controllers;

class CoreController
{
    public function render(string $view, array $data = [])
    {
        extract($data);

        // J'ouvre un buffer
        ob_start();

        include __DIR__ . "/../../views/$view.php";

        // Je ferme le buffer avec le contenu dans une variable
        $content = ob_get_clean();

        include __DIR__ . "/../../views/base.php";
    }
}
