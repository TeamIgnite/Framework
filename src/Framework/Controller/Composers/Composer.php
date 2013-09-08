<?php

namespace Framework\Controller\Composers;


abstract class Composer {

    public $ext;

    public function render($file, $data) {

    }

    public function findView($view) {
        $ext = $this->ext;
        $path = app_path("views/$view.$ext");

        return $path;
    }

}
