<?php

namespace App\Domains\Files\Controllers;

use Barryvdh\Elfinder\ElfinderController;

class FileController extends ElfinderController
{

    public function getViewVars()
    {

        $dir = 'vendor/barryvdh/' . $this->package;
        $locale = str_replace("-",  "_", $this->app->config->get('app.locale'));
        if (!file_exists($this->app['path.public'] . "/$dir/js/i18n/elfinder.$locale.js")) {
            $locale = false;
        }
        $csrf = true;
        return compact('dir', 'locale', 'csrf');

    }
    
}