<?php
namespace Anax\Keys;

use Anax\Commons\ContainerInjectableInterface;

use Anax\Commons\ContainerInjectableTrait;

/**
 *
 */
class Keys implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;
    private $ipstack;
    private $darksky;
    public function __construct()
    {
        $keyConfig = include(__DIR__ . "/../../config/apikeys.php");
        $this->ipstack = $keyConfig["ipstack"];
        $this->darksky = $keyConfig["darksky"];
    }
    public function getApiKey($keyname)
    {
        return $this->$keyname;
    }
}
