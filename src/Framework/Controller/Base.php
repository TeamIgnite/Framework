<?php

namespace Framework\Controller;

use Klein;

/**
 * Class Base
 * This is what a controller should do. Render methods are underscored so we
 * don't conflict with /controller/render
 *
 * @package Framework\Controller
 */
abstract class Base {

    public $charset = 'utf-8';

    /**
     * @var \Klein\Request
     */
    public $request;

    /**
     * @var \Klein\Response
     */
    public $response;


    /**
     * @var \Klein\ServiceProvider
     */
    public $service;

    public $out;

    /**
     * Provide variables
     *
     * @param Klein\Request  $request
     * @param Klein\Response $response
     * @param                $service
     */
    public function __construct(Klein\Request $request, Klein\Response $response, Klein\ServiceProvider $service) {
        $this->request = $request;
        $this->response = $response;
        $this->service = $service;
    }

    public function _preRender() {

    }

    /**
     * Render the controller
     *
     * @param Controller $class Controller Instance
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public function _render($class, $method, $args) {
        return call_user_func_array(array($class, $method), $args);
    }

    public function _postRender() {

    }

}
