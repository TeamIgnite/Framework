<?php

namespace Framework\Console\Commands\Generators;

use Exception;

/**
 * Class Model
 * Model generator
 *
 * @package Framework\Console\Commands\Generators
 */
class Model implements Generator {

    private $allowedTypes = array('basic');

    public $dir = 'models';

    public function generate($name, $type) {
        $name = str_replace('Model', '', $name);
        $type = strtolower($type);

        if(!in_array($type, $this->allowedTypes)) {
            throw new Exception('Type not found');
        }

        $function = $type . 'Model';
        $output = $this->$function($name);

        $this->save($name . '.php', $output);
    }

    /**
     * Basic Model Generator
     *
     * @param $name
     *
     * @return mixed
     */
    public function basicModel($name) {
        $model = '<?php

use Frame\DB\Model as Model;

class [[MODEL]] extends Model {

}

';

        $controller = str_replace('[[MODEL]]', $name, $model);


        return $controller;
    }

    private function save($file, $text) {
        $directory = app_path($this->dir);
        $file = realpath($directory) . '/' . $file;

        file_put_contents($file, $text);
    }

}
