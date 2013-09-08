<?php

class JSONController extends Framework\Controller\JSON {

    public function index() {
        $array = ['testing' => 'success'];

        return $array;
    }

}
