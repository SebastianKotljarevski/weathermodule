<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Json Controller.",
            "mount" => "jsoncontroller",
            "handler" => "\Anax\Controller\JsonController",
        ],
    ]
];
