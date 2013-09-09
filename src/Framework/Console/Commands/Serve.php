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
class Serve extends Command {


    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'serve';

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
    public function fire()
    {
        $this->checkPhpVersion();

        $publicPath = realpath(app_path('../public/'));
        chdir($publicPath);

        $host = $this->input->getOption('host');
        $port = $this->input->getOption('port');


        $this->info("Ignite Framework development server started on http://{$host}:{$port}");

        passthru("php -S {$host}:{$port} -t \"{$publicPath}\"");
    }

    /**
     * Check the current PHP version is >= 5.4.
     *
     * @throws \Exception
     * @return void
     */
    protected function checkPhpVersion()
    {
        if (version_compare(PHP_VERSION, '5.4.0', '<'))
        {
            throw new \Exception('This PHP binary is not version 5.4 or greater.');
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', 'localhost'),

            array('port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', 8000),
        );
    }
}
