<?php

namespace Framework;

use DirectoryIterator;

class Config {

    /**
     * List of files we have loaded into our configuration
     *
     * @var array
     */
    protected $files = array();

    /**
     * All the configuration items those configs contain.
     *
     * @var array
     */
    protected $items = array();

    /**
     * Load all of the files and the config items they contain.
     */
    public function __construct() {

        // If we haven't loaded any files yet find some
        if(empty($files)) {
            $this->files = $this->findFiles();

            foreach($this->files as $file) {
                $this->items[str_replace('.php', '', $file)] = $this->loadItems($file);
            }
        }
    }

    /**
     * Check if key exists
     *
     * @param $key
     *
     * @return bool
     */
    public function exists($key) {
        $item = array_get($this->items, $key);

        return isset($item);
    }

    /**
     * Get a configuration item.
     *
     * @param $key
     *
     * @return mixed
     */
    public function get($key) {
        if(!$this->exists($key)) {
            return false;
        }

        return array_get($this->items, $key);
    }

    public function put($key, $value) {
        array_set($this->items, $key, $value);

        return $value;
    }

    private function findFiles() {
        $files = array();
        foreach (new DirectoryIterator(app_path('config')) as $fileInfo) {
            if($fileInfo->isDot()) continue;

            array_push($files, $fileInfo->getFilename());
        }

        return $files;
    }

    /**
     * Loads the array into a variable.
     *
     * @param $file
     *
     * @return mixed
     */
    private function loadItems($file) {
        return require(app_path("config/$file"));
    }

} 
