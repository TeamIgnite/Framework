<?php

namespace Framework\Console\Commands\Generators;

/**
 * Class Model
 * Model generator
 *
 * @package Framework\Console\Commands\Generators
 */
class Model implements Generator {

    public $dir = 'models';

    public function generate($name, $type) {

    }

    /**
     * Markdown controller generator
     *
     * @param $name
     *
     * @return mixed
     */
    public function model($name) {
        $markdown = "<?php

        class [[CONTROLLER]] extends Framework\\Controller\\Markdown {

        }

        ";

        $controller = str_replace('[[CONTROLLER]]', $name, $markdown);


        return $controller;
    }

    private function save($file, $text) {
        $directory = app_path($this->dir);
        $file = realpath($directory) . $file;

        file_put_contents($file, $text);
    }

}
