<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the FlatFileContentController.
 */
class ControllerWeatherTest extends TestCase
{
    protected $di;
    protected $controller;

    protected function setUp()
    {
        global $di;

        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $di = $this->di;

        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $_GET["location"] = "130.237.28.40";
        $res = $this->controller->indexAction();

        $this->assertInstanceOf("\Anax\Response\Response", $res);

        $body = $res->getBody();
        $exp = "| ramverk1</title>";
        $this->assertContains($exp, $body);
    }

    public function testIndexActionNotValid()
    {
        $_GET["location"] = "255.255.255.256";
        $res = $this->controller->indexAction();

        $this->assertInstanceOf("\Anax\Response\Response", $res);

        $body = $res->getBody();
        $exp = "| ramverk1</title>";
        $this->assertContains($exp, $body);
    }
}
