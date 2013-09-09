<?php

namespace Framework\Console\Commands\Generators;

use Exception;

/**
 * Class Controller
 * Controller Generator
 *
 * @package Framework\Console\Commands\Generators
 */
class Controller implements Generator {

    private $allowedTypes = array('json', 'plain', 'markdown', 'view');

    public $dir = 'controllers';

    public function generate($name, $type) {
        $name = str_replace('Controller', '', $name);
        $type = strtolower($type);

        if(!in_array($type, $this->allowedTypes)) {
            throw new Exception('Type not found');
        }

        $function = $type . 'Controller';
        $output = $this->$function($name);

        $this->save($name . 'Controller.php', $output);
    }

    /**
     * Markdown controller generator
     *
     * @param $name
     *
     * @return mixed
     */
    public function markdownController($name) {
        $markdown = "<?php

class [[CONTROLLER]]Controller extends Framework\\Controller\\Markdown {

    public function index() {
        // Everything is outputted
    }

}
";

        $controller = str_replace('[[CONTROLLER]]', $name, $markdown);


        return $controller;
    }

    /**
     * Markdown controller generator
     *
     * @param $name
     *
     * @return mixed
     */
    public function jsonController($name) {
        $json = "<?php

class [[CONTROLLER]]Controller extends Framework\\Controller\\JSON {

    public function index() {
        // Return output
    }

}
";

        $controller = str_replace('[[CONTROLLER]]', $name, $json);


        return $controller;
    }

    /**
     * View controller generator
     *
     * @param $name
     *
     * @return mixed
     */
    public function viewController($name) {
        $view = '<?php

class [[CONTROLLER]]Controller extends Framework\\Controller\\View {

    public $composer = \'Framework\\Controller\\Composers\\Twig\';

    public function index() {
        // Make the view

        return $this->make(\'[[CONTROLLER]]/index\');
    }

}
';

        $controller = str_replace('[[CONTROLLER]]', $name, $view);


        return $controller;
    }

    /**
     * Plain controller generator
     *
     * @param $name
     *
     * @return mixed
     */
    public function plainController($name) {
        $plain = "<?php

class [[CONTROLLER]]Controller extends Framework\\Controller\\Plain {

    public function index() {
        // Everything is outputted
    }

}
";

        $controller = str_replace('[[CONTROLLER]]', $name, $plain);


        return $controller;
    }

    private function save($file, $text) {
        $directory = app_path($this->dir);
        $file = realpath($directory) . '/' . $file;

        file_put_contents($file, $text);
    }

}
