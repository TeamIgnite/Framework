<?php

namespace Frame\Controller;

/**
 * Class View
 * Renders HTML views
 *
 * @package Frame\Controller
 */
class View extends Base {

    public $data;

    public function _render($out, $args) {
        parent::_render($out, $args);

        $this->response->send();
    }

    /**
     * Make the view
     *
     * @param       $view
     * @param array $data
     */
    public function make($view, $data = array()) {

        $this->service->render(self::findView($view), $data);

    }

    /**
     * Find a view, this will be expanded in the future.
     *
     * @param $view
     *
     * @return string
     */
    private static function findView($view) {
        $path = app_path("views/$view.phtml");

        return $path;
    }

}
