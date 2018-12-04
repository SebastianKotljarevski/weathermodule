<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the FlatFileContentController.
 */
class ControllerTestJson extends TestCase
{
    protected $di;
    protected $controller;

    protected function setUp()
    {
        global $di;

        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $di = $this->di;

        $this->controller = new JsonController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $_GET["ipadress"] = "255.255.255.255";
        $res = $this->controller->indexAction()[0];


        $exp = "255.255.255.255 är en giltig IP adress";
        $this->assertContains($exp, $res["valid"]);
    }

    public function testIndexActionNotValid()
    {
        $_GET["ipadress"] = "255.255.255.256";
        $res = $this->controller->indexAction()[0];

        $exp = "255.255.255.256 är inte en giltig IP adress";
        $this->assertContains($exp, $res["valid"]);
    }
}
