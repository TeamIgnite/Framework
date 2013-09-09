<?php

namespace Framework\Console\Commands;


use Framework\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Serve
 * Ignite Framework Serve command, serves up a PHP app server for development
 *
 * @package Framework\Console\Commands\
 */
class GenerateController extends Command {


    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Serve the application on the PHP development server";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire() {
        $appPath = realpath(app_path());

        $generator = new Generators\Controller($appPath);
        $generator->generate($this->input->getOption('name'), $this->input->getOption('type'));
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return array(
            array('name', null, InputOption::VALUE_REQUIRED, 'The name of the controller.'),
            array('type', null, InputOption::VALUE_REQUIRED, 'The type of the controller.', 'plain'),
        );
    }
}
