<?php

namespace Framework\Console;

use Framework\Console\Commands\GenerateController;
use Framework\Console\Commands\Serve;

use Symfony\Component\Console\Application;

class Console {

    public $app;

    /**
     * Init the console app
     */
    public function __construct() {
        $this->app = new Application();

        $this->load(new Serve);

        // Load generators
        $this->load(new GenerateController);
    }

    /**
     * Load a new command
     *
     * @param Command $command
     */
    public function load(Command $command) {
        $this->app->add(new $command);
    }

    /**
     * Start the interactive console
     */
    public function start() {
        $this->app->run();
    }

    public function __destruct() {
        unset($this->app);
    }

}
