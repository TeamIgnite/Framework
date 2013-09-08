<?php

namespace Framework\Tests;

use Framework\Framework;
use Goutte\Client;
use PHPUnit_Framework_TestCase;

abstract class AbstractFrameTest extends PHPUnit_Framework_TestCase {

    protected $frameApp;

    /**
     * @var Client
     */
    protected $browser;

    protected function setUp() {
        // This isn't ready
        $this->frameApp = new Framework();
        $this->browser = new Client();
    }

}
